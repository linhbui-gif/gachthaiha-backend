<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductCategory\CreateProductCategoryRequest;
use App\Http\Requests\Admin\ProductCategory\UpdateProductCategoryRequest;
use App\Models\CategorySize;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductReview;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductReviewController extends ResourceController
{
    protected $model = ProductReview::class;
    protected $viewPath = 'product_review';
    protected $name = 'Đánh giá sản phẩm';
    protected $route = 'product_review';

    public function __construct()
    {
        $this->data['listProduct'] = Product::pluck('name', 'id')->toArray();
    }

    /**
     * update a category
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->updateData = [
            'name' => $request->name,
            'product_id' => $request->product_id,
            'point' => $request->point,
            'review_content' => $request->review_content,
            'status' => $request->status
        ];
        return parent::update($request, $id);
    }
}
?>
