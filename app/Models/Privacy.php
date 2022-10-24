<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Privacy extends Model
{

    protected  $table = 'privacy';

    const UPDATED_AT = null;
    const CREATED_AT = null;
    
    protected $fillable = [
        'description'
    ];
     
    
    
    
}
