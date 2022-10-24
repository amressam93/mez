<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class Sub_Category extends Model
{

    protected  $table = 'sub_category';

    public $timestamp = true;

    protected $fillable = [
       'title' , 'url'  , 'pic' , 'main_category_id' , 'status','order' , 'sub_title', 'feature'
    ];

    public function main_category()
    {
        return $this->belongsTo('App\Models\Main_Category','main_category_id');
    }


    public function products() {
        return $this->hasMany('App\Models\Product','sub_category_id');
    }

    public function product_images() {
        return $this->hasMany('App\Models\Product_Images','sub_category_id');
    }

    protected static function boot() {
        parent::boot();
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('id', 'asc');
        });
    }





}
