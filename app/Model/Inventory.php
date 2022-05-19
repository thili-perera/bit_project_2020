<?php

namespace App\Model;

use App\Model\Product;
use App\Model\Supplier;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
