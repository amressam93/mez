<?php


use App\Models\Admin;
use App\Models\Color;
use App\Models\Governorates;
use App\Models\Main_Category;
use App\Models\Product_Sizes;
use App\Models\Sub_Category;

if (! function_exists('All_Admin')) {

    function All_Admin()
    {
        return Admin::pluck('name','id');
    }
}


if (! function_exists('H_Main_Products')) {

    function H_Main_Products()
    {
        $arr =  Product_Sizes::where('quantity','>',0)->pluck('product_id')->toArray();
        return $arr;
    }
}


if (! function_exists('H_Main_Category')) {

    function H_Main_Category()
    {
        return Main_Category::where('status',1)->pluck('title','id');
    }
}


if (! function_exists('H_Sub_Category')) {

    function H_Sub_Category()
    {
        return Sub_Category::where('status',1)->pluck('title','id');
    }
}



if (! function_exists('H_Governorates')) {

    function H_Governorates()
    {
        return Governorates::where('status',1)->pluck('name','id');
    }
}



if (! function_exists('H_Colors')) {

    function H_Colors()
    {
        return Color::where('status',1)->pluck('title','id');
    }
}





if (! function_exists('H_Product_Items')) {

    function H_Product_Items($product_id)
    {
        return Product_Sizes::where('product_id',$product_id)->sum('quantity');
    }
}

