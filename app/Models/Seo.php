<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Seo extends BaseModel
{
    use SoftDeletes;
    protected $fillable = [
        'title', 'description','image','type','object_id','created_at','updateda_at','deleted_at'
    ];
    protected $table = "seo";
}
