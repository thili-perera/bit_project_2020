<?php

namespace App\Model;

use App\Model\Product;
use App\Model\Supplier;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function supplier()
    {
        return $this->hasOne(Supplier::class);
    }
}
