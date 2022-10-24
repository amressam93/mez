<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Review extends Model
{

    protected  $table = 'review';

    public $timestamp = true;

    protected $fillable = [
        'user_id','product_id', 'rate', 'notes','viewed'
    ];

    public function product() {
        return $this->belongsTo('App\Models\Product','product_id');
    }



    public function user() {
        return $this->belongsTo('App\Models\Users','user_id');
    }





}
