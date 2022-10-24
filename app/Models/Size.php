<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Size extends Model
{

    protected  $table = 'size';

    public $timestamp = true;
    
    protected $fillable = [ 'title' ,'main_category_id' , 'sub_category_id' ,'status' ];

    public function main_category()
    {
        return $this->belongsTo('App\Models\Main_Category','main_category_id');
    }

    public function sub_category()
    {
        return $this->belongsTo('App\Models\Sub_Category','sub_category_id');
    }
    
    
}
