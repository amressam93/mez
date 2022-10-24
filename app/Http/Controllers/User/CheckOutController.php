<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\AdminMail;
use App\Mail\UserMail;
use App\Models\Cities;
use App\Models\Color;
use App\Models\Coupon;
use App\Models\Governorates;
use App\Models\Invoice;
use App\Models\Invoice_Details;
use App\Models\Invoice_User;
use App\Models\Main_Category;
use App\Models\Product;
use App\Models\Product_Colors;
use App\Models\Product_Sizes;
use App\Models\Setting;
use App\Models\Size;
use App\Models\Users;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckOutController extends Controller
{


    // checkout view
    public function checkout()
    {

        $cart = session()->get('cart');

        if($cart != null) {

            if(count((array) session('cart')) > 0) {

                $main_cat = Main_Category::orderBy('order','asc')->first();
                $currunt_page_id = $main_cat != null ? $main_cat->id : '0';
                $currunt_page_url = $main_cat != null ? $main_cat->url : '0';


                return view('user.cart.checkout',compact('currunt_page_id','currunt_page_url'));
            } else {
                return redirect('cart');
            }

        } else {
            return redirect('cart');
        }

    }


     // calc operation
     public function do_checkout(Request $request)
     {


         $rules = [
             'g-recaptcha-response' => 'required',
             'mobile' => 'required|numeric',
             'email' => 'required|email',
             'name' => 'required',
             'gender' => 'required',
             'gov_id' => 'required',
             'city_id' => 'required',
             'privacy' => 'required'
         ];

         $messges = [
            'g-recaptcha-response.required' => 'حقل g-recaptcha مطلوب',
            'mobile.required' => 'رقم الموبيل مطلوب',
            'mobile.numeric' => 'رقم الموبيل يجب ان يحتوي علي ارقام',
            'email.required' => ' البريد الالكتروني مطلوب',
            'email.email' => 'البريد الالكتروني يجب ان يحتوي علي بريد الكتروني صحيح',
            'name.required' => ' حقل الاسم مطلوب',
            'gender.required' => ' حقل الجنس مطلوب',
            'gov_id.required' => ' حقل المحافظة مطلوب',
            'city_id.required' => ' حقل المدينة مطلوب',
            'privacy.required' => ' حقل سياسة الاستخدام مطلوب',
         ];

         $request->validate($rules,$messges);


         $cart = session()->get('cart');
         $now = Carbon::now();

         $user = Auth::guard('user')->user();

         $Governorate = Governorates::findOrFail($request->gov_id);
         $City = Cities::findOrFail($request->city_id);


         // first check
         if($cart != null && count((array) session('cart')) > 0) {

            foreach((array) session('cart') as $id => $details) {

                $product = Product::where('id',$details['product_id'])->first();

                if($product == null || $details['price'] == null || $details['quantity'] <= 0) {
                    unset($cart[$id]);
                }

                if($product != null) {

                    $product_size = Product_Sizes::where('product_id',$details['product_id'])->where('size_id',$details['size'])->first();

                    if($product_size == null || ($product_size != null && $details['quantity'] > $product_size->quantity)) {
                        unset($cart[$id]);
                    }
                }

            }

            session()->put('cart', $cart);

         }
         // end check

         $setting = Setting::first();


         if($cart != null && count((array) session('cart')) > 0) {

             $Invoice_User = Invoice_User::create([
                 'invoice_id' => null,
                 'serial_number' => null,
                 'user_id' => $user->id,
                 'name' => $request->name,
                 'email' => $request->email,
                 'mobile' => $request->mobile,
                 'gender' => $request->gender,
                 'gov_id' => $request->gov_id,
                 'city_id' => $request->city_id
             ]);

             $uniqueStr = random_int(1000000, 9999999);



             if($this->getCartTotal() > $setting->invoice_total) {
                $calc_shipping = 0;
             } else {
                $calc_shipping = $City->shipping_value;
             }

             if($request->coupon != null) {

                $coupon = Coupon::where('title',$request->coupon)->where('status',1)->first();

                if($coupon != null) {

                    $coupon_id = $coupon->id;
                    $coupon_value = round(( ($this->getCartTotal() + $calc_shipping) * $coupon->value) / 100);

                } else {
                    $coupon_id = 0;
                    $coupon_value = 0;
                }

             } else {
                $coupon_id = 0;
                $coupon_value = 0;
             }


             $calc_total = $this->getCartTotal() + $City->shipping_value - $coupon_value;



             /*
             if($coupon_value >= $calc_total) {
                 $new_total = 0;
             } else {
                $new_total = $this->getCartTotal();
             }
             */


             $new_total = $calc_total;

             $invoice_arr = [
                 'serial_number' => $this->unique_str($uniqueStr),
                 'shipping_id' => $Invoice_User->id,
                 'operation_date' => $now,
                 'count_items' => count((array) session('cart')),
                 'sub_total' => $this->getCartTotal(),
                 'total' => $new_total,
                 'status' => 'جاري المراجعه',
                 'shipping_value' => $calc_shipping,
                 'user_id' => $user->id,
                 'email' => $request->email,
                 'notes' => $request->notes,
                 'address' => $request->address,
                 'coupon_id' => $coupon_id,
                 'coupon_value' => $coupon_value
             ];

             // create invoice
             $invoice = Invoice::create($invoice_arr);

             $Invoice_User->update([ 'invoice_id' => $invoice->id, 'serial_number' => $invoice->serial_number ]);

             foreach((array) session('cart') as $id => $details) {

                 $product = Product::where('id',$details['product_id'])->first();

                 $product_size = Product_Sizes::where('product_id',$details['product_id'])->where('size_id',$details['size'])->first();

                 if($product != null && $details['price'] != null && $product_size != null && $details['quantity'] <= $product_size) {

                     $details_arr = [
                         'invoice_id' => $invoice->id,
                         'serial_number' => $invoice->serial_number,
                         'shipping_id' => $Invoice_User->id,
                         'product_id' => $details['product_id'],
                         'quantity' => $details['quantity'],
                         'sub_total' => $details['price'],
                         'total' => $details['quantity'] * $details['price'],
                         'operation_date' => $now,
                         'user_id' => $user->id,
                         'color' => $details['color'],
                         'size' => $details['size']
                     ];

                     // create invoice details
                     Invoice_Details::create($details_arr);

                     $product_size = Product_Sizes::where('product_id',$details['product_id'])->where('size_id',$details['size'])->first();

                     $product_size->update([
                        'quantity' => $product_size->quantity - $details['quantity']
                     ]);

                     // remove product from cart
                     if(isset($cart[$id])) {

                         unset($cart[$id]);

                         session()->put('cart', $cart);
                     }

                 }

             }






             try {

                 $admin = Setting::first();
                 $inv_details = Invoice_Details::where('invoice_id',$invoice->id)->get();

                 if($admin->email != null) {
                     Mail::to($admin->email)->send(new AdminMail($user,$invoice,$inv_details));
                 }
                 if($user != null) {
                     Mail::to($user->email)->send(new UserMail($user,$invoice,$inv_details));
                 }


             } catch(\Exception $e) {

                return redirect('cart')->with('error','لقد حدث خطاء ما برجاء المحاولة مره اخري');

             }



             return redirect('/')->with('success','تم ارسال طلبك بنجاح');

         } else {
             return redirect('cart')->with('error','عفوا البطاقه فارغه');
         }

     }


    private function unique_str($serial_number) {

        $uniqueStr = random_int(1000000, 9999999);

        while(Invoice::where('serial_number', $serial_number)->exists()) {

            $uniqueStr = random_int(1000000, 9999999);
        }

        return $uniqueStr;

    }


    private function getCartTotal()
    {
        $total = 0;

        $cart = session()->get('cart');

        foreach($cart as $id => $details) {
            $total += $details['price'] * $details['quantity'];
        }

        return $total;
        //return number_format($total, 2);
    }




}
