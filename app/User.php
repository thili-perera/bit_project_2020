<?php

namespace App;

use App\Model\Role;
use App\Model\Order;
use App\Model\Review;
use App\Model\Vehicle;
use App\Model\Wishlist;
use App\Model\Complaint;
use App\Model\BillingAddress;
use App\Model\ShippingAddress;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    public function hasRole($role)
    {
        if ($this->roles()->where('rname', $role)->first()) {
            return true;
        }
        return false;
    }

    public function hasAnyRoles($roles)
    {
        if ($this->roles()->whereIn('rname', $roles)->first()) {
            return true;
        }
        return false;
    }

    public function billing_address()
    {
        return $this->hasOne(BillingAddress::class);
    }

    public function shipping_address()
    {
        return $this->hasOne(ShippingAddress::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function review()
    {
        return $this->belongsTo(Review::class);
    }

    public function vehicle()
    {
        return $this->hasOne(Vehicle::class);
    }

    public function complaint()
    {
        return $this->hasOne(Complaint::class);
    }
}
