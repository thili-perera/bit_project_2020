<?php

namespace App\Model;

use App\Model\Brand;
use App\Model\Order;
use App\Model\Category;
use App\Model\Wishlist;
use App\Model\Inventory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array 
     */
    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'category_id');
    }

    public function hasCategory($category)
    {
        if ($this->categories()->where('catname', $category)->first()) {
            return true;
        }
        return false;
    }

    public function hasAnyCategories($categories)
    {
        if ($this->categories()->whereIn('catname', $categories)->first()) {
            return true;
        }
        return false;
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product', 'product_id', 'order_id')->withpivot('price', 'quantity');
    }

    public function wishlist()
    {
        return $this->belongsTo(Wishlist::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
