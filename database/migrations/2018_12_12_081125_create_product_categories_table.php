<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
class CreateProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->nullable()->comment('Mã danh mục cha');
            $table->string('name', 255)->nullable()->comment('Tên danh mục');
            $table->string('link', 300)->nullable()->comment('Link alias của danh mục');
            $table->text('description')->nullable()->comment('Mô tả danh mục');
            $table->string('image', 255)->nullable()->comment('Ảnh danh mục sản phẩm');
            $table->integer('is_hot')->nullable()->comment('Có phải category hot hiện ở trang chủ không?');
            $table->integer('status')->nullable()->comment('Trạng thái của danh mục');
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
        Schema::dropIfExists('product_categories');
    }
}
