<?php

namespace App\Model;

use App\Model\User;
use App\Model\District;
use Illuminate\Database\Eloquent\Model;

class BillingAddress extends Model
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

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
