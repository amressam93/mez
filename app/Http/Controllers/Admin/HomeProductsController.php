<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About_us;
use App\Models\HomeProducts;

class HomeProductsController extends Controller
{


    public function setting1()
    {
        $Item = HomeProducts::first();
        return view('admin.home_products.home',compact('Item'));
    }

    public function update_setting1(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'main_category_id' => 'required',
            'sub_category_id' => 'required',
            'status' => 'required',
        ]);

        $Item = HomeProducts::first();

        $Item->update($request->except('_token'));

        return redirect()->back()->with('success','تم الحديث بنجاح');
    }



}
