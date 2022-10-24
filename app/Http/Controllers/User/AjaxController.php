<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cities;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Product_Colors;
use App\Models\Product_Sizes;

class AjaxController extends Controller
{



    public function change_product_quantity(Request $request)
    {

        $product_id = $request->id;
        $size_id = $request->product_size;


        if($product_id != null && $size_id != null) {

            $product = Product::where('id',$product_id)->first();
            $product_size = Product_Sizes::where('product_id',$product_id)->where('size_id',$size_id)->first();

            if($product != null && $product_size != null) {

                return response()->json([
                    'val' => $product_size->quantity,
                ]);

            }


        }

    }

    public function ajax_shipping($city_id) {

        $city = Cities::where('id',$city_id)->first();

        if($city != null) {
            return response()->json([
                'shipping' => $city->shipping_value,
            ]);
        }

    }


    public function ajax_check_coupon($coupon)
    {
        $check = Coupon::where("title",$coupon)->where('status',1)->first();

        if($check != null) {
            
            $val = ' تم تفعيل الخصم بنجاح ';
            $type = true;
            $value = $check->value;

        } else {
            
            $val = 'البيانات غير صحيحة';
            $type = false;
            $value = 0;
        }

        return response()->json([ 'data' => $val, 'type' => $type, 'value' => $value ]);

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
