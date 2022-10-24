<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Cities extends Model
{

    protected  $table = 'cities';

    public $timestamp = true;
    
    protected $fillable = [
        'name','governorate_id','shipping_value','status'
    ];

    public function governorate()
    {
        return $this->belongsTo('App\Models\Governorates','governorate_id');
    }     
    
    
}
