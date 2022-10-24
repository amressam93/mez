<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Top_Offer_Categories extends Model
{

    protected  $table = 'top_offer_categories';

    protected $fillable = [
        'top_offer_id', 'category_id'
    ];

    public $timestamps = true;




}
