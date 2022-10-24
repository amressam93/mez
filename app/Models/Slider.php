<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Slider extends Model
{

    protected  $table = 'slider';

    public $timestamps = true;

    protected $fillable = [
        'url', 'pic1'
    ];




}
