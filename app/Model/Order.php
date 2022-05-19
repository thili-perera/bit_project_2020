<?php

namespace App\Model;

use App\Model\User;
use App\Model\Review;
use App\Model\Product;
use App\Model\Delivery;
use App\Model\Complaint;
use App\Model\ShippingAddress;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id')->withpivot('price', 'quantity', 'product_id');
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }

    // public function billing_address()
    // {
    //     return $this->belongsTo(BillingAddress::class);
    // }

    public function shipping_address()
    {
        return $this->belongsTo(ShippingAddress::class);
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }

    public function complaint()
    {
        return $this->hasOne(Complaint::class);
    }
}
