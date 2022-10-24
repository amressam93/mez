<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Setting extends Model
{

    protected  $table = 'setting';

    const UPDATED_AT = null;
    const CREATED_AT = null;

    protected $fillable = [
        'email', 'mobile',
        'facebook_link', 'instgram_link', 'twitter_link',
        'product_sizes_count','header_logo',
        'whatsapp','website_name','sizes','invoice_total',
        'price_title','add_to_cart_title'
    ];



}
