<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    public function provinces()
    {
        return $this->hasMany(CountryProvince::class,'country_id','id');
    }
}
