<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Governorates extends Model
{

    protected  $table = 'governorates';

    public $timestamp = true;
    
    protected $fillable = [
        'name','status'
    ];

    public function cities()
    {
        return $this->hasMany('App\Models\Cities','governorate_id');
    }
    
    
}
