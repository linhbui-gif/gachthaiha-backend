<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->comment('Tên tour');
            $table->string('link', 300)->comment('Đường dẫn tour');
            $table->string('image', 300)->nullable()->comment('Ảnh đại diện');
            $table->string('description', 500)->nullable()->comment('Mô tả tour');
            $table->text('detail')->nullable()->comment('Mô tả tour');
            $table->unsignedInteger('news_category_id')->nullable()->comment('Danh mục tin');
            $table->integer('status')->default(\App\Models\BaseModel::STATUS_ACTIVE)->comment('Trạng thái');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->softDeletes();

            /*$table->foreign('news_category_id')
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
        Schema::dropIfExists('news');
    }
}
