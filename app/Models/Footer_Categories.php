<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Footer_Categories extends Model
{

    protected  $table = 'footer_categories';

    protected $fillable = [
        'footer_id', 'category_id'
    ];

    public $timestamps = true;




}
