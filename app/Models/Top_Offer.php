<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Top_Offer extends Model
{

    protected  $table = 'top_offer';

    protected $fillable = [
        'title','link','color'
    ];

    public $timestamps = true;




}
