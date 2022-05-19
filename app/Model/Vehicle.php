<?php

namespace App\Model;

use App\Model\User;
use App\Model\Driver;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
