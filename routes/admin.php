<?php

use Illuminate\Support\Facades\Route;


// Home

Route::get('/', 'AdminController@home');


// Admins

Route::resource('admin','AdminController',
['names' => 'admin_panel.admin']);

// Admin Update Password
Route::patch('admin/update_password/{id}', 'AdminController@UpdatePass')->name('admin_panel.admin.UpdatePass');

Route::get('admin/destroy/{id}','AdminController@destroy');



// Pages

Route::resource('pages','PagesController',
['names' => 'admin_panel.pages']);

Route::get('pages/destroy/{id}','PagesController@destroy');



// Setting

Route::get('setting','SettingController@setting');
Route::post('setting','SettingController@update_setting');



// Main_Category

Route::resource('main_categories','Main_CategoryController',
['names' => 'admin_panel.main_categories']);

Route::post('main_categories/update-order','Main_CategoryController@update_order');


Route::get('main_categories/un_active/{id}','Main_CategoryController@un_active');
Route::get('main_categories/active/{id}','Main_CategoryController@active');




// Sub_Category

Route::resource('sub_categories','Sub_CategoryController',
['names' => 'admin_panel.sub_categories']);


Route::get('sub_categories/un_active/{id}','Sub_CategoryController@un_active');
Route::get('sub_categories/active/{id}','Sub_CategoryController@active');

Route::post('sub_categories/update-order','Sub_CategoryController@update_order');

Route::get('sub_categories/{id}/feature','Sub_CategoryController@feature_catgeory');



// Product

Route::resource('products','ProductsController',
['names' => 'admin_panel.products']);

Route::get('products/destroy/{id}','ProductsController@destroy');

Route::get('product_images/delete_image/{id}','ProductsController@delete_image');

Route::post('add_product_images','ProductsController@add_product_images');

Route::get('products/un_active/{id}','ProductsController@un_active');
Route::get('products/active/{id}','ProductsController@active');


// Governorates

Route::resource('governorates','GovernoratesController',
['names' => 'admin_panel.governorates']);

Route::get('governorates/un_active/{id}','GovernoratesController@un_active');
Route::get('governorates/active/{id}','GovernoratesController@active');


// Cities

Route::resource('cities','CitiesController',
['names' => 'admin_panel.cities']);

Route::get('cities/un_active/{id}','CitiesController@un_active');
Route::get('cities/active/{id}','CitiesController@active');


// Color

Route::resource('color','ColorController',
['names' => 'admin_panel.color']);

Route::get('color/un_active/{id}','ColorController@un_active');
Route::get('color/active/{id}','ColorController@active');




// Categories Ads

Route::resource('categories_ads','CategoriesAdsController',
['names' => 'admin_panel.categories_ads']);

Route::get('categories_ads/destroy/{id}','CategoriesAdsController@destroy');

Route::get('color/un_active/{id}','ColorController@un_active');
Route::get('color/active/{id}','ColorController@active');

Route::post('categories_ads/update-order','CategoriesAdsController@update_order');




// Top Offer

Route::resource('top_offer','TopOffserController',
['names' => 'admin_panel.top_offer']);

Route::get('top_offer/destroy/{id}','TopOffserController@destroy');




// Size

Route::resource('size','SizeController',
['names' => 'admin_panel.size']);

Route::get('size/un_active/{id}','SizeController@un_active');
Route::get('size/active/{id}','SizeController@active');


// Slider

Route::resource('slider','SliderController',
['names' => 'admin_panel.slider']);

Route::get('slider/destroy/{id}','SliderController@destroy');



// About Us

Route::get('about_us','AboutController@setting1');
Route::post('about_us','AboutController@update_setting1');


Route::get('home_products','HomeProductsController@setting1');
Route::post('home_products','HomeProductsController@update_setting1');



// privacy

Route::get('privacy','PrivacyController@setting1');
Route::post('privacy','PrivacyController@update_setting1');



// home_ads

Route::get('home_ads','Home_AdsController@setting');
Route::post('home_ads','Home_AdsController@update_setting');


// Coupon

Route::resource('coupon','CouponController',
['names' => 'admin_panel.coupon']);

Route::get('coupon_accept/{id}','CouponController@coupon_accept');

Route::get('coupon_refused/{id}','CouponController@coupon_refused');

Route::get('coupon/orders/{id}','CouponController@coupon_orders');


// Footer

Route::resource('footer','FooterController',
['names' => 'admin_panel.footer']);

Route::get('footer/destroy/{id}','FooterController@destroy');


// Top Header

Route::resource('top_header','TopHeaderController',
['names' => 'admin_panel.top_header']);

Route::get('top_header/destroy/{id}','TopHeaderController@destroy');



// Message

Route::get('messages','MessageController@messages');
Route::get('messages/destroy/{id}','MessageController@delete_message');



// Users

Route::resource('users','UsersController',
['names' => 'admin_panel.users']);

Route::get('users/destroy/{id}','UsersController@destroy');

Route::get('users/inovice_details/{user_id}/{invoice_id}','UsersController@inovice_details');


// Invoices

Route::get('invoices','InvoicesController@all_invoices');
Route::get('invoice_details/{serial_no}','InvoicesController@invoice_details');

Route::get('invoice_status','InvoicesController@update_invoice_status');

Route::get('invoices/destroy/{id}','InvoicesController@delete_invoice');

Route::get('invoices/print/{id}','InvoicesController@print');



// Ajax

Route::get('ajax_sub_category/{main_category_id}','AjaxController@ajax_sub_category');

Route::get('ajax_sizes/{sub_category_id}','AjaxController@ajax_sizes');

Route::get('ajax_cities/{gov_id}','AjaxController@ajax_cities');







