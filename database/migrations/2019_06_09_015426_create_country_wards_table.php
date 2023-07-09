<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
class CreateCountryWardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_wards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('country_id')->nullable()->comment('Mã quốc gia');
            $table->integer('province_id')->nullable()->comment('Mã tỉnh thành');
            $table->integer('district_id')->nullable()->comment('Mã quận huyện');
            $table->string('name', 255)->nullable()->comment('Tên xã phường');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('country_wards');
    }
}
