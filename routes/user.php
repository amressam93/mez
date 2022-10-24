<?php

use App\Models\Main_Category;
use Illuminate\Support\Facades\Route;


Route::get('profile', function() {

    $main_cat = Main_Category::first();
    $currunt_page_id = $main_cat != null ? $main_cat->id : '0';
    $currunt_page_url = $main_cat != null ? $main_cat->url : '0';

    return view('user.personal.profile',compact('currunt_page_id','currunt_page_url'));
});


Route::get('update_profile', function() {

    $main_cat = Main_Category::first();
    $currunt_page_id = $main_cat != null ? $main_cat->id : '0';
    $currunt_page_url = $main_cat != null ? $main_cat->url : '0';

    return view('user.personal.update_profile',compact('currunt_page_id','currunt_page_url'));
});

Route::post('update_profile', 'RegisterController@update_profile');


Route::get('orders', function() {

    $main_cat = Main_Category::first();
    $currunt_page_id = $main_cat != null ? $main_cat->id : '0';
    $currunt_page_url = $main_cat != null ? $main_cat->url : '0';

    return view('user.personal.orders',compact('currunt_page_id','currunt_page_url'));
});

Route::get('order/{serial_number}', 'HomeController@user_order_details');

Route::get('cancel_order/{serial_number}', 'HomeController@cancel_order');

Route::get('checkout', 'CheckOutController@checkout');

Route::post('checkout', 'CheckOutController@do_checkout');





Route::post('add_review', 'ReviewController@add_review');
Route::post('edit_review', 'ReviewController@edit_review');

Route::post('add_reply', 'ReviewController@add_reply');
