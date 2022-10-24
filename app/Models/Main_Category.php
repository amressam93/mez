<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;



class Main_Category extends Model
{

    protected  $table = 'main_category';

    public $timestamp = true;

    protected $fillable = [
       'title' , 'url'  , 'pic' , 'status','order'
    ];

    public function sub_categories()
    {
        return $this->hasMany('App\Models\Sub_Category','main_category_id');
    }

    public function products() {
        return $this->hasMany('App\Models\Product','main_category_id');
    }

    public function product_images() {
        return $this->hasMany('App\Models\Product_Images','main_category_id');
    }

    protected static function boot() {
        parent::boot();
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('id', 'asc');
        });
    }




}
