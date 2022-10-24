<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;



class Invoice_Details extends Model
{

    protected  $table = 'invoice_details';

    public $timestamps = true;
    
    protected $fillable = [
       'invoice_id','serial_number','shipping_id','user_id','product_id','quantity',
       'operation_date','sub_total','total','color','size'
    ];
    
    
    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id');
    }

    public function product_color() {
        return $this->belongsTo('App\Models\Color','color');
    }

    public function product_size() {
        return $this->belongsTo('App\Models\Size','size');
    }


    protected static function boot() {
        parent::boot();
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('id', 'desc');
        });
    }
    
    
    
}
