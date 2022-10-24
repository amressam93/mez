<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Coupon extends Model
{   
    
    protected  $table = 'coupon';

    protected $fillable = [
        'title','status','value'
    ];

   
    public $timestamps = true;

    public function orders() {
        return $this->hasMany('App\Models\Invoice','coupon');
    }
    
    


}
