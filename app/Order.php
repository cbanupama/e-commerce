<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'number', 'amount', 'delivery_address', 'payment_method', 'payment_status'
    ];
}
