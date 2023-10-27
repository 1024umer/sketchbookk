<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id','product_id','user_id','stripe_checkout_id','email','first_name','last_name','address','country','city','postal_code','last_name2','address2','country2','city2','postal_code2','notes','stripe_status'
    ];
}
