<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

use Carbon\Carbon;


class Product_Sizes extends Model
{

    protected  $table = 'product_sizes';

    public $timestamp = true;

    protected $fillable = [ 'product_id' , 'size_id', 'quantity', 'order'  ];
     
    public function size()
    {
        return $this->belongsTo('App\Models\Size','size_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id');
    }
    
    
    
}
