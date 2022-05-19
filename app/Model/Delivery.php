<?php

namespace App\Model;

use App\Model\User;
use App\Model\Order;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    public function order()
    {
        return $this->hasOne(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
