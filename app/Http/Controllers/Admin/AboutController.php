<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About_us;


class AboutController extends Controller
{
     

    public function setting1()
    {
        $Item = About_us::first();
        return view('admin.about_us.home',compact('Item'));
    }

    public function update_setting1(Request $request)
    {
      
        $request->validate([
            'description' => 'required',
        ]);

        $About_Us = About_us::first();

        $About_Us->update([
            'description' => $request->description,
        ]);
                
        return redirect()->back()->with('success','Successfully updated');
    }



}
