<?php

namespace App\Model;

use App\Model\User;
use App\Model\Order;
use App\Model\District;
use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
