<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Invoice_Details;
use App\Models\Main_Category;
use App\Models\Pages;
use App\Models\Product;
use App\Models\Product_Category;
use App\Models\Product_Colors;
use App\Models\Product_Sizes;
use App\Models\Product_Tags;
use App\Models\Sub_Category;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    public function shop() {

        $Item = Product::orderBy('created_at','desc')->inRandomOrder()->get([ 'id', 'title' , 'brand' , 'price' , 'discount', 'url','pic','price_before_discount' ]);
        $count = $Item->count();
        return view('user.pages.shop',compact('Item','count'));
    }



    public function user_order_details($serial_number) {

        $user_id = Auth::guard('user')->user()->id;
        $invoice = Invoice::where('serial_number',$serial_number)->first();
        $orders = Invoice_Details::where('serial_number',$serial_number)->where('user_id',$user_id)->get();
        return view('user.personal.order_details',compact('orders','invoice'));
    }

    public function cancel_order($serial_number) {

        $user_id = Auth::guard('user')->user()->id;
        $invoice = Invoice::where('serial_number',$serial_number)->where('user_id',$user_id)->where('status','جاري المراجعه')->firstOrFail();

        $invoice->update([
            'status' => 'تم الالغاء	(مستخدم)',
        ]);

        $details = Invoice_Details::where('invoice_id',$invoice->id)->where('user_id',$user_id)->get(['quantity','product_id','size','id']);

        foreach ($details as $value) {

            $product_size = Product_Sizes::where('product_id',$value->product_id)->where('size_id',$value->size)->first();

            if($product_size != null) {
                $product_size->update([
                    'quantity' => $product_size->quantity + $value->quantity
                ]);
            }

        }

        return redirect()->back()->with('error','تم الغاء الفاتوره بنجاح');
    }


    public function header_search(Request $request) {

        $Products = Product::where("title", 'LIKE', '%' . $request->search . '%')->where('status',1)->inRandomOrder()->get([ 'id', 'title' , 'brand' , 'price' , 'discount', 'url','pic','price_before_discount' ]);
        $count = $Products->count();
        $search = $request->search;

        $main_cat = Main_Category::orderBy('order','asc')->first();
        $currunt_page_id = $main_cat != null ? $main_cat->id : '0';
        $currunt_page_url = $main_cat != null ? $main_cat->url : '0';

        return view('user.search.header_search',compact('Products','count','search','currunt_page_id','currunt_page_url'));
    }


    public function products_search(Request $request) {

        $request->validate([
            'sub_category_id' => 'required'
        ]);

        $sub_category_id = $request->sub_category_id;
        $Item = Sub_Category::findOrFail($sub_category_id);

        $selected_size_arr = $request->size_id;
        $selected_color_arr = $request->color_id;
        $selected_price_type = $request->price;

        $Products = Product::select('*')->where('sub_category_id',$request->sub_category_id)
        ->where(function ($query) use($request,$selected_size_arr,$selected_color_arr,$selected_price_type){

            if($selected_size_arr !=null && ! empty($selected_size_arr)){

                $product_id_arr = Product_Sizes::whereIn('size_id',$selected_size_arr)->pluck('product_id')->toArray();

                if(! empty($product_id_arr)) {
                    $query->whereIn('id',$product_id_arr);
                }
            }

            if($selected_color_arr !=null && ! empty($selected_color_arr)){

                $product_id_arr = Product_Colors::whereIn('color_id',$selected_color_arr)->pluck('product_id')->toArray();

                if(! empty($product_id_arr)) {
                    $query->whereIn('id',$product_id_arr);
                }
            }

            if($selected_price_type != null){

                if($selected_price_type == 1) {
                    $query->orderBy('price','asc');
                }

                if($selected_price_type == 2) {
                    $query->orderBy('price','desc');
                }
            }


        })
        ->where('status',1)
        ->inRandomOrder()
        ->get([ 'id', 'title' , 'brand' , 'price' , 'discount', 'url','pic','price_before_discount' ]);

        $main_cat = Main_Category::orderBy('order','asc')->first();
        $currunt_page_id = $main_cat != null ? $main_cat->id : '0';
        $currunt_page_url = $main_cat != null ? $main_cat->url : '0';

        return view('user.search.filter',[
            'Products' => $Products,
            'currunt_page_id' => $currunt_page_id,
            'currunt_page_url' => $currunt_page_url,
            'Item' => $Item,
            'selected_size_arr' => $selected_size_arr,
            'selected_color_arr' => $selected_color_arr,
            'selected_price_type' => $selected_price_type,
        ]);


    }



    public function product_tags($url) {

        $product_arr = Product_Tags::where("url", 'LIKE', '%' . $url . '%')->pluck('product_id')->toArray();

        $arr = H_Main_Products();

        if(! empty($arr)) {

            if(! empty($product_arr)) {

                $Products = Product::whereIn('id',$arr)->whereIn('id',$product_arr)->where('status',1)->inRandomOrder()->get([ 'id', 'title' , 'brand' , 'price' , 'discount', 'url','pic','price_before_discount' ]);
                $count = $Products->count();

            } else {
                $Products = null;
                $count = 0;

                return $this->search($url);
            }

        } else {
            $Products = null;
            $count = 0;

            return $this->search($url);
        }

        return view('user.search.show_tag_products',[
            'Products' => $Products,
            'key' => $url,
            'count' => $count,
            'active_url' => null
        ]);

    }




    // link search

    public function search($url) {

        if( in_array($url, Main_Category::where('status',1)->pluck('url','id')->toArray()) ) {

            $arr = H_Main_Products();

            $Item = Main_Category::where('url',$url)->first();

            if(! empty($arr)) {
                $Products = Product::whereIn('id',$arr)->where('main_category_id',$Item->id)->where('status',1)->inRandomOrder()->get([ 'id', 'title' , 'brand' , 'price' , 'discount', 'url','pic','price_before_discount' ]);
                $count = $Products->count();
            } else {
                $Products = null;
                $count = 0;
            }

            $currunt_page_id = $Item->id;
            $currunt_page_url = $Item->url;

            return view('user.search.show_products',[
                'Products' => $Products,
                'Item' => $Item,
                'count' => $count,
                'active_url' => $url,
                'currunt_page_id' => $currunt_page_id,
                'currunt_page_url' => $currunt_page_url,
            ]);

        } elseif( in_array($url, Sub_Category::where('status',1)->pluck('url','id')->toArray()) ) {

            $arr = H_Main_Products();

            $Item = Sub_Category::where('url',$url)->first();

            if(! empty($arr)) {
                $Products = Product::whereIn('id',$arr)->where('sub_category_id',$Item->id)->where('status',1)->inRandomOrder()->get([ 'id', 'title' , 'brand' , 'price' , 'discount', 'url','pic','price_before_discount' ]);
                $count = $Products->count();
            } else {
                $Products = null;
                $count = 0;
            }

            $currunt_page_id = $Item->main_category->id;
            $currunt_page_url = $Item->main_category->url;

            return view('user.search.show_products2',[
                'Products' => $Products,
                'Item' => $Item,
                'count' => $count,
                'active_url' => $Item->main_category->url,
                'currunt_page_id' => $currunt_page_id,
                'currunt_page_url' => $currunt_page_url,
                'active_sub_id' => $Item->id
            ]);

        } elseif( in_array($url, Product::where('status',1)->pluck('url','id')->toArray()) ) {

            $arr = H_Main_Products();

            $Item = Product::whereIn('id',$arr)->where('url',$url)->where('status',1)->firstOrFail();

            $currunt_page_id = $Item->main_category->id;
            $currunt_page_url = $Item->main_category->url;

            return view('user.search.single_product',[
                'Item' => $Item,
                'active_url' => $Item->main_category->url,
                'currunt_page_id' => $currunt_page_id,
                'currunt_page_url' => $currunt_page_url,
            ]);

        } elseif( in_array($url, Pages::pluck('url','id')->toArray()) ) {


            $Item = Pages::where('url',$url)->firstOrFail();

            $main_cat = Main_Category::orderBy('order','asc')->first();
            $currunt_page_id = $main_cat != null ? $main_cat->id : '0';
            $currunt_page_url = $main_cat != null ? $main_cat->url : '0';

            return view('user.search.show_page',[
                'Item' => $Item,
                'currunt_page_id' => $currunt_page_id,
                'currunt_page_url' => $currunt_page_url,
            ]);

        } else {
            abort('404');
        }


    }





}
