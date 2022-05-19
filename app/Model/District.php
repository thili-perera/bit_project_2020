<?php

namespace App\Model;

use App\Model\BillingAddress;
use App\Model\ShippingAddress;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function billingaddress()
    {
        return $this->hasOne(BillingAddress::class);
    }

    public function shippingaddress()
    {
        return $this->hasOne(ShippingAddress::class);
    }
}
