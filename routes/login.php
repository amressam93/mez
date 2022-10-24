<?php

use Illuminate\Support\Facades\Route;


// admin login

Route::get('admin_panel/login', 'AdminLogin@login');
Route::post('admin_panel/login', 'AdminLogin@login_post')->name('admin_panel.login');
Route::get('admin_panel/logout', 'AdminLogin@logout')->name('admin_panel.logout');



// register

Route::get('register', function() {
    return redirect('login');
});

Route::post('register', 'User\RegisterController@register');



// login

Route::get('login', 'User\Login@login');
Route::post('login', 'User\Login@login_post');
Route::get('logout', 'User\Login@logout');






// checkout register

Route::get('checkout_register', function() {
    return redirect('cart');
});

Route::post('checkout_register', 'User\CheckoutLogin@register');


// checkout ogin


Route::get('checkout_login', function() {
    return redirect('cart');
});

Route::post('checkout_login', 'User\CheckoutLogin@login_post');









