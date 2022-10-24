<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home_Ads;
use Auth;
use Intervention\Image\ImageManagerStatic as Image;


class Home_AdsController extends Controller
{


    public function setting()
    {
        $Item = Home_Ads::first();
        return view('admin.home_ads.home',compact('Item'));
    }

    public function update_setting(Request $request)
    {


        $request->validate([
            'status1' => 'required',
            'status2' => 'required',
            'status3' => 'required',
            'status4' => 'required',
            'status5' => 'required',
            'pic1_v1' => 'nullable|image|mimes:jpg,png,jpeg,gif',
            'pic2_v1'  => 'nullable|image|mimes:jpg,png,jpeg,gif',
            'pic1_v2' => 'nullable|image|mimes:jpg,png,jpeg,gif',
            'pic1_v3' => 'nullable|image|mimes:jpg,png,jpeg,gif',
            'pic1_v4' => 'nullable|image|mimes:jpg,png,jpeg,gif',
            'pic2_v4' => 'nullable|image|mimes:jpg,png,jpeg,gif',
            'pic3_v4' => 'nullable|image|mimes:jpg,png,jpeg,gif',
            'pic1_v5' => 'nullable|image|mimes:jpg,png,jpeg,gif',
        ]);

        $Home_Ads = Home_Ads::first();

        $arr = $request->except(['pic1_v1','pic1_v2','pic1_v3','pic1_v4','pic2_v4','pic3_v4','pic1_v5']);

        $Home_Ads->update($arr);

        $path = public_path('ads');

        $input['pic1_v1'] =  upload()->UploadImage('pic1_v1',$path,$Home_Ads,null,null,null);
        $input['pic2_v1'] =  upload()->UploadImage('pic2_v1',$path,$Home_Ads,null,null,null);

        $input['pic1_v2'] =  upload()->UploadImage('pic1_v2',$path,$Home_Ads,null,null,null);
        //$input['pic2_v2'] =  upload()->UploadImage('pic2_v2',$path,$Home_Ads,null,null,null);

        $input['pic1_v3'] =  upload()->UploadImage('pic1_v3',$path,$Home_Ads,null,null,null);
        //$input['pic2_v3'] =  upload()->UploadImage('pic2_v3',$path,$Home_Ads,null,null,null);

        $input['pic1_v4'] =  upload()->UploadImage('pic1_v4',$path,$Home_Ads,null,null,null);
        $input['pic2_v4'] =  upload()->UploadImage('pic2_v4',$path,$Home_Ads,null,null,null);
        $input['pic3_v4'] =  upload()->UploadImage('pic3_v4',$path,$Home_Ads,null,null,null);

        $input['pic1_v5'] =  upload()->UploadImage('pic1_v5',$path,$Home_Ads,null,null,null);


        $Home_Ads->update($input);

        return redirect()->back()->with('success','تم تحديث البيانات بنجاح');

    }


}
