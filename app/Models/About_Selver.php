<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class About_Selver extends Model
{

    protected  $table = 'about_selver';

    const UPDATED_AT = null;
    const CREATED_AT = null;
    
    protected $fillable = [
        'description'
    ];
     
    
    
    
}
