<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->comment('Tiêu đề trang');
            $table->string('link', 300)->comment('Đường dẫn trang');
            $table->string('image', 300)->nullable()->comment('Ảnh đại diện');
            $table->string('description', 500)->nullable()->comment('Mô tả trang');
            $table->text('detail')->nullable()->comment('Chi tiết trang');
            $table->integer('status')->default(\App\Models\BaseModel::STATUS_ACTIVE)->comment('Trạng thái');
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
        Schema::dropIfExists('pages');
    }
}
