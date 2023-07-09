<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends BaseModel
{
    protected $fillable = [
        'name', 'email', 'status'
    ];
}
