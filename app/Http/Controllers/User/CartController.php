<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Invoice_Details;
use App\Models\Product;
use App\Models\Product_Colors;
use App\Models\Product_Sizes;
use App\Models\Users;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Auth;

class CartController extends Controller
{



    public function addToCart(Request $request)
    {

        $size = $request->size;
        $id = $request->id;

        $product = Product::findOrFail($id);

        if(!$product) {
            return false;
        }

        $product_color = Product_Colors::where('product_id',$product->id)->first();

        if(!$product_color) {
            return false;
        }

        $color = $product_color->color_id;

        $calc_price = $product->price;

        $quantity = $request->quantity;

        $product_size = Product_Sizes::where('product_id',$id)->where('size_id',$size)->first();

        if($product_size == null) {
            return false;
        }

        if($quantity < 1) {
            $quantity = 1;
        }

        if($quantity > $product_size->quantity) {
            return response()->json([ 'error'=> 'عفوا الكمية المطلوبة اكبر من الموجوده حاليا لهذا المنتج مع المقاس المطلوب' ]);
        }


        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                $this->unique_str() => [
                    "name" => $product->title,
                    "product_id" => $id,
                    "price" => $calc_price,
                    "photo" => $product->small_pic,
                    "quantity" => $quantity,
                    "color" => $color,
                    "size" => $size,
                ]
            ];

            session()->put('cart', $cart);

            $count = count((array) session('cart'));

            $htmlCart = view('user.cart.header_cart')->render();

            return response()->json([
                'msg' => 'تمت إضافة المنتج بنجاح',
                'data' => $htmlCart,
                'count' => $count,
            ]);

        } else {


            // if cart not empty then check if this product exist

            $k = null;
            $v = null;

            foreach($cart as $key => $value) {

                if($value['product_id'] == $id) {

                    if( ($color == $value["color"]) && ($size == $value["size"]) ) {

                        $k = $key;
                        $v = 'update';
                    }

                    if(
                        ( ($color == $value["color"]) && ($size != $value["size"]) ) ||
                        ( ($color != $value["color"]) && ($size == $value["size"]) ) ) {

                        $k = $key;
                        $v = 'create';
                    }

                }

            }


            // موجود بس اللون او الححجم واحد منهم بس ايلي موجود
            if($v == 'create') {

                $cart[$this->unique_str()] = [
                    "name" => $product->title,
                    "product_id" => $id,
                    "price" => $calc_price,
                    "photo" => $product->small_pic,
                    "quantity" => $quantity,
                    "color" => $color,
                    "size" => $size,
                ];

                session()->put('cart', $cart);

                $count = count((array) session('cart'));

                $htmlCart = view('user.cart.header_cart')->render();

                //dd($cart);
                return response()->json([
                    'msg' => 'تمت إضافة المنتج بنجاح',
                    'data' => $htmlCart,
                    'count' => $count,
                ]);


            //  موجود بس اللون والحجم متطابقين
            } elseif($v == 'update') {

                $cart[$k]['quantity']  = $quantity;

                session()->put('cart', $cart);

                $count = count((array) session('cart'));

                $htmlCart = view('user.cart.header_cart')->render();

                //dd($cart);
                return response()->json([
                    'msg' =>  'هذا المنتج موجود مسبقا تم تحديث العدد بنجاح',
                    'data' => $htmlCart,
                    'count' => $count,
                    "color" => $color,
                    "size" => $size,
                ]);


            // موجود ومفيش تطابق في اللون والحجم او مش موجود
            } else {

                $cart[$this->unique_str()] = [
                    "name" => $product->title,
                    "product_id" => $id,
                    "price" => $calc_price,
                    "photo" => $product->small_pic,
                    "quantity" => $quantity,
                    "color" => $color,
                    "size" => $size,
                ];

                session()->put('cart', $cart);

                $count = count((array) session('cart'));

                $htmlCart = view('user.cart.header_cart')->render();

                //dd($cart);
                return response()->json([
                    'msg' => 'تمت إضافة المنتج بنجاح',
                    'data' => $htmlCart,
                    'count' => $count,
                    "color" => $color,
                    "size" => $size,
                ]);

            }


        }


    }




    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            $total = $this->getCartTotal();

            $htmlCart = view('user.cart.header_cart')->render();

            $count = count((array) session('cart'));

            return response()->json([
                'msg' => 'تم حذف المنتج بنجاح',
                'data' => $htmlCart,
                'total' => $total,
                'count' => $count
            ]);

        }
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


    public function update_cart(Request $request)
    {

        if($request->main_id != null && $request->id && $request->quantity && $request->quantity > 0)
        {

            $cart = session()->get('cart');

            if($cart != null) {

                $product = Product::where('id',$cart[$request->id]["product_id"])->first();

                if($product != null) {

                    $size = $cart[$request->id]["size"];

                    $check = Product_Sizes::where('product_id',$cart[$request->id]["product_id"])->where('size_id',$size)->first();

                    if($check != null && $request->quantity <= $check->quantity) {

                        $cart[$request->id]["quantity"] = $request->quantity;

                        session()->put('cart', $cart);

                        $subTotal = $cart[$request->id]['quantity'] * $cart[$request->id]['price'];

                        $total = $this->getCartTotal();

                        $htmlCart = view('user.cart.header_cart')->render();

                        return response()->json([
                            'msg' => 'تم تحديث البطاقه بنجاح',
                            'data' => $htmlCart,
                            'total' => $total,
                            'subTotal' => $subTotal
                        ]);
                    }

                }

            }


            //session()->flash('success', 'Cart updated successfully');
        }
    }



    private function unique_str() {

        $uniqueStr = Str::random(8);

        if(session()->get('cart') != null) {

            while(array_key_exists($uniqueStr,session()->get('cart'))) {

                $uniqueStr = Str::random(8);
            }

            return $uniqueStr;

        } else {
            return $uniqueStr;
        }



    }







}
