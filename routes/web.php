<?php

use Illuminate\Support\Facades\Route;


//////////// Login

require_once __DIR__ . '/login.php';



//////////// Admin

Route::group(['middleware' => ['AuthAdmin:admin'] , 'namespace' => 'Admin' , 'prefix' => 'admin_panel'],function () {

    require_once __DIR__ . '/admin.php';

});

//////////// User

Route::group(['middleware' => ['AuthUser:user'] , 'namespace' => 'User' , 'prefix' => '/'],function () {

    require_once __DIR__ . '/user.php';

});

//////////// Gest

require_once __DIR__ . '/gest.php';


// admin password reset routes

Route::prefix('admin_panel')->group(function () {

    Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin_panel.password.email');
    Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm');
    Route::post('/password/reset','Auth\AdminResetPasswordController@reset')->name('admin_panel.password.request');
    Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin_panel.password.reset');

});



// User  Password Reset

Route::prefix('/')->group(function () {
   
    Route::post('password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset','Auth\ForgotPasswordController@showLinkRequestForm');
    Route::post('password/reset','Auth\ResetPasswordController@reset')->name('password.request');
    Route::get('password/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('password.reset');

});




//////////////////////

Route::get('redirect/{service}', 'User\SocialiteController@redirect');
Route::get('callback/facebook', 'User\SocialiteController@callback_v1');
Route::get('callback/google', 'User\SocialiteController@callback_v2');


///////////////////////////


Route::get('{url}', 'User\HomeController@search');

Route::get('{url}', 'User\HomeController@product_tags');

