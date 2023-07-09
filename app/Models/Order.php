<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends BaseModel
{
    public function detail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
