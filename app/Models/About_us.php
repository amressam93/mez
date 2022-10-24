<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class About_us extends Model
{

    protected  $table = 'about_us';

    const UPDATED_AT = null;
    const CREATED_AT = null;
    
    protected $fillable = [
        'description'
    ];
     
    
}
