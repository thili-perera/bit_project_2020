<?php

namespace App\Model;

use App\User;
use App\Model\Order;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
