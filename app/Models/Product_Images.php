<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Product_Images extends Model
{

    protected  $table = 'product_images';

    public $timestamp = true;
    
    protected $fillable = [
        'main_category_id' , 'sub_category_id' , 'product_id' ,  'slider','small_slider','original_slider'
    ];

    public function main_category()
    {
        return $this->belongsTo('App\Models\Main_Category','main_category_id');
    }

    public function sub_category()
    {
        return $this->belongsTo('App\Models\Sub_Category','sub_category_id');
    }
     
    
    
}
