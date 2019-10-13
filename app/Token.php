<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $fillable = [
        'token_sub',
        'token_des',
        'customer_id',
        'deposit_amount',
        'payment_status',
    ];
}
