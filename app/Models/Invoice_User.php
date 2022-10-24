<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Invoice_User extends Model
{   
    
    protected  $table = 'shipping_information';

    protected $fillable = [
        'name', 'email','mobile','gender','gov_id','city_id',            
        'invoice_id','serial_number','user_id'
    ];

    public function governorate() {
        return $this->belongsTo('App\Models\Governorates','gov_id');
    }

    public function city() {
        return $this->belongsTo('App\Models\Cities','city_id');
    }

   
    public $timestamps = true;
    
    


}
