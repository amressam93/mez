<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    


    public function register(Request $request)
    {
        
        $rules = [
            'g-recaptcha-response' => 'required',
            'mobile' => 'required|numeric|unique:admin|unique:users',
            'email' => 'required|email|unique:admin|unique:users',
            'name' => 'required',
            'gender' => 'required',
            'gov_id' => 'required',
            'city_id' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
            'privacy' => 'required'
        ];

        
        $messges = [
            'g-recaptcha-response.required' => 'حقل g-recaptcha مطلوب',
            'mobile.required' => 'رقم الموبيل مطلوب',
            'mobile.numeric' => 'رقم الموبيل يجب ان يحتوي علي ارقام',
            'email.required' => ' البريد الالكتروني مطلوب',
            'email.email' => 'البريد الالكتروني يجب ان يحتوي علي بريد الكتروني صحيح',
            'name.required' => ' حقل الاسم مطلوب',
            'gender.required' => ' حقل الجنس مطلوب',
            'gov_id.required' => ' حقل المحافظة مطلوب',
            'city_id.required' => ' حقل المدينة مطلوب',
            'privacy.required' => ' حقل سياسة الاستخدام مطلوب',
            'password.required' => ' حقل كلمة المرور مطلوب',
            'password.confirmed' => ' حقل كلمة المرور يجب ان يتطابق مع تكرار كلمه المرور',
            'password.min' => ' حقل كلمة المرور يجب ان يحتوي علي الاقل علي 6 احرف او رقام',
            'password_confirmation.required' => ' حقل كرر كلمة المرور مطلوب',
            'password_confirmation.min' => ' حقل كرر كلمة المرور يجب ان يحتوي علي الاقل علي 6 احرف او رقام',
         ];

        
        $request->validate($rules,$messges);
    
        $arr = [
            'type' => 1,
            'user_id' => 0,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'name' => $request->name, 
            'gender' => $request->gender,
            'gov_id' => $request->gov_id,
            'city_id' => $request->city_id,
            'password' => bcrypt($request->password)
        ];

        $user = Users::create($arr);

         if (Auth::guard('user')->attempt([ 'email' => $user->email , 'password' => request('password') ] ) ) {

             return redirect('profile');

         } else {

           return redirect('login');

         }


    
    }


    public function update_profile(Request $request) {
        
        $user_id = Auth::guard('user')->user()->id;

        $User = Users::where('id',$user_id)->first(); 

        $validate_arr = [
            'mobile' => 'required|numeric|unique:admin|unique:users,mobile,' . $user_id,
            'name' => 'required',
            'gender' => 'required',
            'gov_id' => 'required',
            'city_id' => 'required',
        ];

        if($User->type == 1) {
            $validate_arr['email'] = 'required|email|unique:admin|unique:users,email,' . $user_id;
            $validate_arr['password'] = 'nullable|min:6';
        }

        $request->validate($validate_arr);

        

        $arr = [ 
            'mobile' => $request->mobile,
            'name' => $request->name, 
            'gender' => $request->gender,
            'gov_id' => $request->gov_id,
            'city_id' => $request->city_id,
        ];

        if($User->type == 1) {

            if($request->password != null) {
                $arr['password'] = bcrypt($request->password);
            } else {
                $arr['password'] = $User->password;
            }

            $arr['email'] = $request->email;
            
        }

        
        $User->update($arr);
        
    
        return redirect()->back()->with('success','تم تحديث الملف الشخصي بنجاح');



    }



        
    
}
