<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends BaseModel
{
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
