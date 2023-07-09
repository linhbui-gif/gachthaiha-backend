<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductCategory\CreateProductCategoryRequest;
use App\Http\Requests\Admin\ProductCategory\UpdateProductCategoryRequest;
use App\Models\CategorySize;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductComment;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductCommentController extends ResourceController
{
    protected $model = ProductComment::class;
    protected $viewPath = 'product_comment';
    protected $name = 'Bình luận sản phẩm';
    protected $route = 'product_comment';

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
            'product_id' => $request->product_id,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'comment' => $request->comment,
            'status' => $request->status
        ];

        return parent::update($request, $id);
    }
}
?>
