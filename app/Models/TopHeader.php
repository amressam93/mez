<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class TopHeader extends Model
{

    protected  $table = 'top_header';

    protected $fillable = [
        'icon', 'title','sub_title'
    ];

    public $timestamps = true;




}
