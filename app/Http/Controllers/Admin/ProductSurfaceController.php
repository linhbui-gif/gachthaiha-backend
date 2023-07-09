<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductCategory\CreateProductCategoryRequest;
use App\Http\Requests\Admin\ProductCategory\UpdateProductCategoryRequest;
use App\Models\CategorySize;
use App\Models\ProductCategory;
use App\Models\ProductSurface;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductSurfaceController extends ResourceController
{
    protected $model = ProductSurface::class;
    protected $viewPath = 'product_surface';
    protected $name = 'Bề mặt';
    protected $route = 'product_surface';


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
            'status' => $request->status
        ];
        return parent::update($request, $id);
    }
}
?>
