<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Footer extends Model
{

    protected  $table = 'footer';

    protected $fillable = [
        'icon', 'title'
    ];

    public $timestamps = true;




}
