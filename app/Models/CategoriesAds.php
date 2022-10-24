<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;



class CategoriesAds extends Model
{

    protected  $table = 'categories_ads';

    public $timestamp = true;

    protected $fillable = [
       'title' , 'url1'  , 'pic1' , 'status', 'order'
    ];


    protected static function boot() {
        parent::boot();
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('id', 'asc');
        });
    }




}
