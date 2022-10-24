<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cities;
use App\Models\Size;
use App\Models\Sub_Category;


class AjaxController extends Controller
{
    
    

    public function ajax_sub_category($main_category_id)
    {
        $sub_category = Sub_Category::where('status',1)->where('main_category_id',$main_category_id)->get();
        $sub_category = $sub_category->pluck('title','id');
        return json_encode($sub_category);
    }

    public function ajax_sizes($sub_category_id)
    {
        $sizes = Size::where('status',1)->where('sub_category_id',$sub_category_id)->pluck('title','id')->toArray();
        return json_encode($sizes);
    }
    

    public function ajax_cities($gov_id)
    {
        $cities = Cities::where('status',1)->where('governorate_id',$gov_id)->pluck('name','id');
        return json_encode($cities);
    }

    
}
