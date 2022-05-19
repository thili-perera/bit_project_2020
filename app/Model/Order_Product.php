<?php

namespace App\Model;

use App\Model\Complaint;
use Illuminate\Database\Eloquent\Model;

class Order_Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'order_product';


    public function complaint()
    {
        return $this->hasOne(Complaint::class);
    }
}
