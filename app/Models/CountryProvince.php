<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryProvince extends Model
{
    public function districts()
    {
        return $this->hasMany(CountryDistrict::class, 'province_id', 'id');
    }
}
