<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Home_Ads extends Model
{

    protected  $table = 'home_ads';

    const UPDATED_AT = null;
    const CREATED_AT = null;

    protected $fillable = [
        'title_v1', 'pic1_v1', 'pic2_v1' , 'link1_v1', 'link2_v1',
        'title_v2', 'pic1_v2', 'link1_v2',
        'title_v3', 'pic1_v3', 'link1_v3',
        'title_v4','pic1_v4', 'pic2_v4', 'pic3_v4', 'link1_v4', 'link2_v4', 'link3_v4',
        'title_v5', 'pic1_v5', 'link1_v5',
        'status1', 'status2', 'status3', 'status4', 'status5'

    ];





}
