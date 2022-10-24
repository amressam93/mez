<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Product_Colors extends Model
{

    protected  $table = 'product_colors';

    public $timestamp = true;
    
    protected $fillable = [
       'product_id' ,  'color_id'   
    ];

    public function color()
    {
        return $this->belongsTo('App\Models\Color','color_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id');
    }

   
    
    
    
}
