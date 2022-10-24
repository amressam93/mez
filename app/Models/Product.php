<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;


class Product extends Model
{

    protected  $table = 'product';

    public $timestamps = true;

    protected $fillable = [

       'title' , 'main_category_id' , 'sub_category_id' , 'brand' , 'price' , 'discount', 'price_before_discount',
       'short_description' , 'long_description','url','pic','small_pic','status'

    ];


    public function main_category()
    {
        return $this->belongsTo('App\Models\Main_Category','main_category_id');
    }

    public function sub_category()
    {
        return $this->belongsTo('App\Models\Sub_Category','sub_category_id');
    }

    public function product_images() {
        return $this->hasMany('App\Models\Product_Images','product_id');
    }

    public function product_sizes() {
        return $this->hasMany('App\Models\Product_Sizes','product_id');
    }

    public function product_colors() {
        return $this->hasMany('App\Models\Product_Colors','product_id');
    }


    protected static function boot() {
        parent::boot();
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('id', 'desc');
        });
    }






}
