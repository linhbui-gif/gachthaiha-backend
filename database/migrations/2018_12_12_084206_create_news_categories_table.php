<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateNewsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->comment('Tên danh mục');
            $table->string('link', 300)->comment('Đường dẫn danh mục');
            $table->unsignedInteger('parent_id')->nullable()->comment('Cấp cha');
            $table->string('image', 255)->nullable()->comment('Ảnh danh mục');
            $table->text('description')->nullable()->comment('Mô tả danh mục');
            $table->integer('is_hot')->default(\App\Models\BaseModel::STATUS_INACTIVE)->comment('Có hot không?');
            $table->integer('status')->default(\App\Models\BaseModel::STATUS_ACTIVE)->comment('Trạng thái');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->softDeletes();

            /*$table->foreign('parent_id')
                ->references('id')
                ->on('news_categories')
                ->onDelete('cascade');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_categories');
    }
}
