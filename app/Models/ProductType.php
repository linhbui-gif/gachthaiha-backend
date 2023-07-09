<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends BaseModel
{
    protected $fillable = ['name', 'link', 'status'];
}
