<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->nullable()->comment('Tên liên hệ');
            $table->string('phone', 255)->nullable()->comment('Số điện thoại liên hệ');
            $table->string('email', 255)->nullable()->comment('Email liên hệ');
            $table->string('address', 500)->nullable()->comment('Địa chỉ liên hệ');
            $table->string('title', 255)->nullable()->comment('Tiêu đề liên hệ');
            $table->text('content')->nullable()->comment('Nội dung liên hệ');
            $table->integer('status')->default(\App\Models\BaseModel::STATUS_INACTIVE)->comment('Trạng thái liên hệ');
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
        Schema::dropIfExists('contacts');
    }
}
