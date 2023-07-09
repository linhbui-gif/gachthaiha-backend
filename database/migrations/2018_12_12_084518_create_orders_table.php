<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable()->comment('Tên khách hàng');
            $table->string('phone', 255)->nullable()->comment('Số điện thoại khách hàng');
            $table->string('address', 255)->nullable()->comment('Địa chỉ khách hàng');
            $table->string('note', 500)->nullable()->comment('Ghi chú');
            $table->float('total_amount', 12, 2)->nullable()->comment('Tổng tiền');
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
        Schema::dropIfExists('orders');
    }
}
