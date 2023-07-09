<?php
namespace App\Http\Controllers\Admin;

use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends ResourceController
{
    protected $model = ProductType::class;
    protected $viewPath = 'product_type';
    protected $name = 'Loại sản phẩm';
    protected $route = 'product_type';

    /**
     * update a product type
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->updateData = [
            'name' => $request->name,
            'status' => $request->status
        ];

        return parent::update($request, $id);
    }
}
?>
