<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminLogin extends Controller
{


    public function login() {

        if(Auth::guard('admin')->check()){
            return redirect('admin_panel');
        }
        else{
            return view('admin.layouts.login');
        }
    }

    public function login_post(Request $request) {

        $remember = $request->has('remember') ? true : false;

        if ( Auth::guard('admin')->attempt([ 'email' => request('email') , 'password' => request('password')] , $remember) ) {
           
            return redirect('admin_panel');
        } else {
            return redirect()->back()->with('error','Please Check Your Email and Password again');
        }
    }

    public function logout(Request $request) {
        Auth::guard('admin')->logout();
        return redirect('admin_panel/login');
    }
}
