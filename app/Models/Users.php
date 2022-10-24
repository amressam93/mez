<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\ResetPasswordNotification;


class Users extends Authenticatable
{

    use Notifiable;
    
    protected  $table = 'users';

    public $timestamps = true;

    protected $fillable = [ 
         
        'name', 'email','mobile','gender','gov_id','city_id','password','user_id','type'            
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
     
    
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    
    
    
}
