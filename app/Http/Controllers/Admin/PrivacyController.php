<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Privacy;

class PrivacyController extends Controller
{
     
    public function setting1()
    {
        $Item = Privacy::first();
        return view('admin.privacy.home',compact('Item'));
    }

    public function update_setting1(Request $request)
    {
      
        $request->validate([
            'description' => 'required',
        ]);

        $Item = Privacy::first();

        $Item->update([
            'description' => $request->description,
        ]);
                
        return redirect()->back()->with('success','Successfully updated');
    }


    



}
