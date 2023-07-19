<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends BaseModel
{
    protected $table = "orders";
    public function detail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
