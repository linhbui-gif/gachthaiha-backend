<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
class CreateProductCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->nullable()->comment('Product ID');
            $table->integer('parent_id')->nullable()->comment('Parent ID');
            $table->string('name', 255)->nullable()->comment('Customer Name');
            $table->string('phone', 255)->nullable()->comment('Customer Phone');
            $table->string('email', 255)->nullable()->comment('Customer Email');
            $table->string('comment', 500)->nullable()->comment('Customer Comment');
            $table->integer('status')->nullable()->comment('Status');
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
        Schema::dropIfExists('product_comments');
    }
}
