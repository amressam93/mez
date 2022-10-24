<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class Invoice extends Model
{

    protected  $table = 'invoice';

    public $timestamps = true;

    protected $fillable = [
       'shipping_id','user_id','operation_date','serial_number',
       'count_items', 'shipping_value','sub_total','total','status','notes','email',
       'address','coupon_id','coupon_value'
    ];


    public function coupon()
    {
        return $this->belongsTo('App\Models\Coupon','coupon_id');
    }

    protected static function boot() {
        parent::boot();
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('id', 'desc');
        });
    }






}
