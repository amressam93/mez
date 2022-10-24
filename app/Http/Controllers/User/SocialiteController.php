<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
//use App\Http\Requests\User as modelRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use App\Models\Users;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SocialiteController extends Controller
{

    protected $redirectTo;

    public function redirect($service) {

        session(['link' => url()->previous()]);
        $this->redirectTo = session('link');
        return Socialite::driver($service)->redirect();

    }


    public function callback_v1() {

        $this->redirectTo = session('link');

         $main_user = Socialite::with('facebook')->user();
         //$main_user = Socialite::driver('facebook')->stateless()->user();


        $user = Users::where('user_id',$main_user->getId())->first();

        if($user == null) {

            $count = Users::where('email',$main_user->getEmail())->count();

            if($count > 0) {

                return redirect('login')->with('error','البريد الإلكتروني للمستخدم موجود مسبقا');

            } else {

                $user = Users::create([
                    'type' => 2,
                    'user_id' => $main_user->getId(),
                    'name' => $main_user->getName(),
                    'email' => $main_user->getEmail(),
                    'mobile' => null,
                    'gender' => null,
                    'gov_id' => null,
                    'city_id' => null,
                    'password' => Hash::make(Str::random(24))
                 ]);

                 Auth::guard('user')->login($user,true);

                return redirect('profile');

            }



        } else {

            Auth::guard('user')->login($user,true);

            return redirect('profile');

        }






    }

    public function callback_v2() {

        $this->redirectTo = session('link');

        $main_user = Socialite::with('google')->user();
        //$main_user = Socialite::driver('google')->stateless()->user();


       $user = Users::where('user_id',$main_user->getId())->first();

       if($user == null) {

        $count = Users::where('email',$main_user->getEmail())->count();

           if($count > 0) {

            return redirect('login')->with('error','البريد الإلكتروني للمستخدم موجود مسبقا');

           } else {

            $user = Users::create([
                'type' => 3,
                'user_id' => $main_user->getId(),
                'name' => $main_user->getName(),
                'email' => $main_user->getEmail(),
                'mobile' => null,
                'gender' => null,
                'gov_id' => null,
                'city_id' => null,
                'password' => Hash::make(Str::random(24))
             ]);

             Auth::guard('user')->login($user,true);

            return redirect('profile');

           }



       } else {

        Auth::guard('user')->login($user,true);

        return redirect('profile');

    }



   }









}
