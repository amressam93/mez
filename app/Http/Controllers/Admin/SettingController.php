<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\Admin as modelRequest;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Setting;
use Auth;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;


class SettingController extends Controller
{



    public function setting()
    {
        $Setting = Setting::first();
        return view('admin.layouts.setting',compact('Setting'));
    }

    public function update_setting(Request $request)
    {
        $request->validate([
            'product_sizes_count' => 'required|numeric|min:1',
            'email' => 'required|email',
            'website_name' => 'required',
            'mobile' => 'required|numeric',
            'invoice_total' => 'required|numeric|min:1',
            'whatsapp' => 'required|numeric',
            'facebook_link' => 'nullable',
            'twitter_link' => 'nullable',
            'instgram_link' => 'nullable',
            'product_advertisement' => 'nullable|image|mimes:jpg,png,jpeg',
            'header_logo' => 'nullable|image|mimes:jpg,png,jpeg',
        ]);

        $Setting = Setting::first();


        $Setting->update([
            'product_sizes_count' => $request->product_sizes_count,
            'invoice_total' => $request->invoice_total,
            'email' => $request->email,
            'website_name' => $request->website_name,
            'whatsapp' => $request->whatsapp,
            'mobile' => $request->mobile,
            'facebook_link' => $request->facebook_link,
            'twitter_link' => $request->twitter_link,
            'instgram_link' => $request->instgram_link,
            'price_title' => $request->price_title,
            'add_to_cart_title' => $request->add_to_cart_title,
        ]);

        if($request->file('header_logo') != null) {

            $path = 'logo';

            $header_logo = 'mezeta-logo'. '.' . $request->file('header_logo')->getClientOriginalExtension();

            request()->file('header_logo')->move($path, $header_logo);

            $Setting->update(['header_logo' => $header_logo]);
        }

        return redirect()->back()->with('success','تم تحديث الاعدادت بنجاح');
    }



}
