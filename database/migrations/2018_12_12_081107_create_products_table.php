<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id')->nullable()->comment('Danh mục sản phẩm');
            $table->unsignedInteger('size_id')->nullable()->comment('Kích thước');
            $table->unsignedInteger('type_id')->nullable()->comment('Loại sản phẩm');
            $table->unsignedInteger('surface_id')->nullable()->comment('Loại bề mặt');
            $table->unsignedInteger('brand_id')->nullable()->comment('Thương hiệu');
            $table->string('sku', 255)->nullable()->comment('Mã sản phẩm');
            $table->string('name', 255)->nullable()->comment('Tên sản phẩm');
            $table->string('link', 300)->nullable()->comment('Đường dẫn sản phẩm');
            $table->string('description', 500)->nullable()->comment('Mô tả tour');
            $table->text('detail')->nullable()->comment('Mô tả tour');
            $table->float('purchase_price', 12, 2)->nullable()->comment('Giá nhập');
            $table->float('price', 12, 2)->nullable()->comment('Giá bán');
            $table->float('listed_price', 12, 2)->nullable()->comment('Giá niêm yết');
            $table->float('sale_price', 12, 2)->nullable()->comment('Giá khuyến mãi');
            $table->float('wholesale_price', 12, 2)->nullable()->comment('Giá công trình - giá sỉ');
            $table->string('image', 255)->nullable()->comment('Ảnh đại diện sản phẩm');
            $table->text('feature_image')->nullable()->comment('Danh sách ảnh tính năng, lưu dạng json');
            $table->integer('is_hot')->default(\App\Models\BaseModel::STATUS_INACTIVE)->comment('Có phải sản phẩm hot không?');
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
        Schema::dropIfExists('products');
    }
}
