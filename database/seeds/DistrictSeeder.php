<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Country;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = Country::first();
        if (empty($country)) {
            $sqlString = file_get_contents(database_path('seeds/country_province_district_ward.sql'));
            DB::unprepared($sqlString);
        }
    }
}
