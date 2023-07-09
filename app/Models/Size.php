<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends BaseModel
{
    protected $fillable = [
        'name', 'status'
    ];

    public function category()
    {
        return $this->belongsToMany(
            ProductCategory::class,
            'category_sizes',
            'size_id',
            'category_id',
            'id');
    }


}
