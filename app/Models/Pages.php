<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;



class Pages extends Model
{

    protected  $table = 'pages';

    public $timestamp = true;

    protected $fillable = [
       'title' , 'url'  , 'description'
    ];


    protected static function boot() {
        parent::boot();
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('id', 'asc');
        });
    }




}
