<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Ads_Categories extends Model
{

    protected  $table = 'ads_categories';

    public $timestamps = true;

    protected $fillable = [
        'ads_id', 'category_id'
    ];




}
