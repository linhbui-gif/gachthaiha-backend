<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryDistrict extends Model
{
    public function wards()
    {
        return $this->hasMany(CountryWard::class, 'district_id', 'id');
    }
}
