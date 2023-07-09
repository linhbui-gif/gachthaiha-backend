<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateCustomerReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_name', 255)->comment('Tên khách hàng');
            $table->string('position', 255)->comment('Chức vụ của khách hàng');
            $table->string('company', 255)->comment('Tên công ty');
            $table->string('image', 255)->comment('Ảnh đại diện khách hàng');
            $table->text('content')->comment('Nội dung đánh giá của khách hàng');
            $table->integer('status')->default(\App\Models\BaseModel::STATUS_ACTIVE)->comment('Tên danh mục tour');
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
        Schema::dropIfExists('customer_reviews');
    }
}
