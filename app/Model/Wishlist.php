<?php

namespace App\Model;

use App\Model\User;
use App\Model\Product;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
