<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateMenuDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_id');
            $table->string('type', 255)->nullable()->comment('Loại menu (link tùy chỉnh, sản phẩm, bài viết...');
            $table->string('title', 255)->nullable()->comment('Tiêu đề menu');
            $table->integer('parent_id')->nullable()->comment('Menu cha');
            $table->string('link', 255)->nullable()->comment('Link menu');
            $table->integer('position')->nullable()->comment('Vị trí trong menu');
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
        Schema::dropIfExists('menu_details');
    }
}
