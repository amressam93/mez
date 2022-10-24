<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Color extends Model
{

    protected  $table = 'colors';

    public $timestamp = true;
    
    protected $fillable = [
       'title', 'value' ,'status'
    ];
     
    
    
    
}
