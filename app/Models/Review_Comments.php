<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Review_Comments extends Model
{

    protected  $table = 'review_comments';

    public $timestamp = true;

    protected $fillable = [
        'user_id', 'product_id', 'review_id', 'comment'
    ];

    public function service() {
        $this->belongsTo('App\Models\Product','product_id');
    }





}
