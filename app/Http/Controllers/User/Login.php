<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Main_Category;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{

    protected $redirectTo;


    public function login() {

        session(['link' => url()->previous()]);

        $this->redirectTo = session('link');

        if(Auth::guard('user')->check()) {

            if(request()->segment(1) == 'login' || $this->redirectTo == null) {
                return redirect('profile');
            } else {
                return redirect($this->redirectTo);
            }

        } else{


            $main_cat = Main_Category::orderBy('order','asc')->first();
            $currunt_page_id = $main_cat != null ? $main_cat->id : '0';
            $currunt_page_url = $main_cat != null ? $main_cat->url : '0';

            //session(['link' => url()->previous()]);
            return view('user.layouts.login',compact('currunt_page_id','currunt_page_url'));
        }
    }


    public function login_post(Request $request) {

        $remember = $request->has('remember') ? true : false;

        $request->validate([
            'email_or_mobile' => 'required',
            'pass' => 'required',
        ]);

        $this->redirectTo = session('link');

        if(Auth::guard('user')->attempt([ 'email' => request('email_or_mobile') , 'password' => request('pass') ] , $remember) ) {

            $user = Auth::guard('user')->user();

            if($user->type == 1) {
                return redirect($this->redirectTo);
            } else {
                Auth::guard('user')->logout();
                return redirect('login')->with('warning', 'يجب ان تمتلك عضويه اولا');
            }


        } elseif(Auth::guard('user')->attempt([ 'mobile' => request('email_or_mobile') , 'password' => request('pass') ] , $remember) ) {

            $user = Auth::guard('user')->user();

            if($user->type == 1) {
                return redirect($this->redirectTo);
            } else {
                Auth::guard('user')->logout();
                return redirect('login')->with('warning', 'يجب ان تمتلك عضويه اولا');
            }

        } else {
            return redirect()->back()->with('error','يرجى التحقق من بريدك الإلكتروني / الموبيل وكلمة المرور مرة أخرى');
        }
    }

    public function logout(Request $request) {

        Auth::guard('user')->logout();

        session()->forget('link');

        return redirect('/');


    }



}
