<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Slider_Categories extends Model
{

    protected  $table = 'slider_categories';

    public $timestamps = true;

    protected $fillable = [
        'slider_id', 'category_id'
    ];




}
