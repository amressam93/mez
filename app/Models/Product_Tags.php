<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;


class Product_Tags extends Model
{

    protected  $table = 'tags';

    public $timestamps = true;
    
    protected $fillable = [
        'product_id','tag','url'
    ];


    protected static function boot() {
        parent::boot();
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('id', 'desc');
        });
    }

    
    
    
}
