<?php

use App\Mail\Contact_usMail;
use App\Models\Main_Category;
use App\Models\Messages;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


Route::get('/', function() {

    $main_cat = Main_Category::orderBy('order','asc')->first();
    $currunt_page_id = $main_cat != null ? $main_cat->id : '0';
    $currunt_page_url = $main_cat != null ? $main_cat->url : '0';

    return view('user.layouts.home',compact('currunt_page_id','currunt_page_url'));
});

Route::get('about_us', function() {

    $main_cat = Main_Category::orderBy('order','asc')->first();
    $currunt_page_id = $main_cat != null ? $main_cat->id : '0';
    $currunt_page_url = $main_cat != null ? $main_cat->url : '0';

    return view('user.pages.about_us',compact('currunt_page_id','currunt_page_url'));
});

Route::get('privacy', function() {

    $main_cat = Main_Category::orderBy('order','asc')->first();
    $currunt_page_id = $main_cat != null ? $main_cat->id : '0';
    $currunt_page_url = $main_cat != null ? $main_cat->url : '0';

    return view('user.pages.privacy',compact('currunt_page_id','currunt_page_url'));
});


Route::get('contact_us', function() {

    $main_cat = Main_Category::orderBy('order','asc')->first();
    $currunt_page_id = $main_cat != null ? $main_cat->id : '0';
    $currunt_page_url = $main_cat != null ? $main_cat->url : '0';

    return view('user.pages.contact_us',compact('currunt_page_id','currunt_page_url'));
});



Route::get('shop', 'User\HomeController@shop');

Route::get('search', 'User\HomeController@header_search');

Route::get('products-search', 'User\HomeController@products_search');


////////////////////////////////////////////////// Cart


Route::group([ 'namespace' => 'User' ],function () {

    require_once __DIR__ . '/admin.php';

    Route::post('add-to-cart', 'CartController@addToCart');

    Route::delete('remove-from-cart', 'CartController@remove');

    Route::get('cart', function() {

        $main_cat = Main_Category::orderBy('order','asc')->first();
        $currunt_page_id = $main_cat != null ? $main_cat->id : '0';
        $currunt_page_url = $main_cat != null ? $main_cat->url : '0';

        return view('user.cart.cart',compact('currunt_page_id','currunt_page_url'));
    });

    Route::patch('update-cart', 'CartController@update_cart');


});



//////////// contact

Route::post('contact_us', function(Request $request) {

    $request->validate([
        'name' => 'required',
        'mobile' => 'required|numeric',
        'email' => 'required|email',
        'message' => 'required',
        'g-recaptcha-response' => 'required'
    ]);


    $message = Messages::create([
        'name' => $request->name,
        'mobile' => $request->mobile,
        'email' => $request->email,
        'message' => $request->message
    ]);




    $setting = Setting::first();

    if($setting->email != null) {
        Mail::to($setting->email)->send(new Contact_usMail($message));
    }


    return redirect('contact_us')->with('success','تم ارسال الرساله بنجاح');





});



////////////////////////////////////////////////// Ajax


Route::get('ajax_cities/{gov_id}','Admin\AjaxController@ajax_cities');

Route::get('ajax_shipping/{city_id}','User\AjaxController@ajax_shipping');

Route::get('ajax_check_coupon/{value}','User\AjaxController@ajax_check_coupon');

Route::post('change_product_quantity','User\AjaxController@change_product_quantity');






