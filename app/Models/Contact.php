<?php

namespace App\Models;

use App\Models\BaseModel;

class Contact extends BaseModel
{
    protected $fillable = [
        'name', 'email', 'phone', 'address', 'title', 'content', 'status'
    ];

}
