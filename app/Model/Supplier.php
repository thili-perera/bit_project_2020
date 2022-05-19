<?php

namespace App\Model;

use App\Model\Brand;
use App\Model\Inventory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
