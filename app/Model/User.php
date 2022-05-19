<?php

namespace App\Model;

use App\Model\Role;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

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
}
