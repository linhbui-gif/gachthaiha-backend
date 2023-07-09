<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSurface;
use App\Models\ProductType;
use App\Models\Size;
use App\Rules\MoneyFormatRule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends ResourceController
{
    protected $model = Product::class;
    protected $viewPath = 'product';
    protected $name = 'Sản phẩm';
    protected $route = 'product';


    public function __construct()
    {
        $this->data['listCategory'] = ProductCategory::pluck('name', 'id')->toArray();
        $this->data['listBrand'] = Brand::pluck('name', 'id')->toArray();
        $this->data['listSize'] = Size::pluck('name', 'id')->toArray();
        $this->data['listType'] = ProductType::pluck('name', 'id')->toArray();
        $this->data['listSurface'] = ProductSurface::pluck('name', 'id')->toArray();
    }


    public function search(Request $request)
    {
        /**
         * Search
         */
        if($request->submit_type == 'search'){
            $listData = $this->model::getList($request);
            $html = view('admin.'.$this->viewPath.'.search', compact('listData', 'request'));
            return response()->json(['success' => true, 'message' => trans('admin.success'), 'html' => $html->render()]);
        }

        /**
         * Excel export
         */
        $listProduct = Product::name($request->name)
            ->sizeId($request->size_id)
            ->status($request->status)
            ->category($request->category_id)
            ->typeId($request->type_id)
            ->surfaceId($request->surface_id)
            ->fromPrice($request->from_price)
            ->toPrice($request->to_price)
            ->brandId($request->brand)
            ->with('category')
            ->sortOrder($request)->get();

        $fileName = 'product_' . time();
        Excel::create($fileName, function ($excel) use ($listProduct) {
            // Set the title
            $excel->setTitle('Danh sách sản phẩm');

            // Chain the setters
            $excel->setCreator('Nguyen Tat Loi')
                ->setCompany('HapiSolution');

            // Call them separately
            $excel->setDescription('Danh sách sản phẩm trên hệ thống Gạch Thái Hà');

            $excel->sheet('Sheet 1', function ($sheet) use ($listProduct) {
                $sheet->loadView('admin.product.excel', compact('listProduct'));
            });

        })->store('xlsx', public_path('excel/exports'));

        $fileUrl = asset('excel/exports/'.$fileName.'.xlsx');

        return response()->json(['success' => true, 'message' => trans('admin.success'), 'url' => $fileUrl]);

    }


    /**
     * Update product
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->updateData = [
            'sku' => $request->sku,
            'name' => $request->name,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'type_id' => $request->type_id,
            'size_id' => $request->size_id,
            'surface_id' => $request->surface_id,
            'link' => $request->link,
            'description' => $request->description,
            'detail' => $request->detail,
            'price' => str_replace([',', '.'], '', $request->price),
            'sale_price' => str_replace([',', '.'], '', $request->sale_price),
            'wholesale_price' => str_replace([',', '.'], '', $request->wholesale_price),
            'image' => $request->image,
            'feature_image' => json_encode($request->feature_image),
            'status' => $request->status
        ];

        return parent::update($request, $id);
    }


    public function updatePrice(Request $request)
    {
        $this->validate($request, [
            'id' => ['required', 'integer'],
            'field' => ['required', Rule::in(['price', 'purchase_price', 'listed_price', 'sale_price', 'wholesale_price'])],
            'data' => ['required', new MoneyFormatRule()]
        ]);

        $post = $request->all();
        $newPrice = str_replace(',', '', $post['data']);
        $update = [
            $post['field'] => $newPrice
        ];
        Product::where('id', $post['id'])->update($update);
        return response()->json(['success' => true, 'message' => 'Update success', 'price' => number_format($newPrice)]);
    }


    /**
     * Update excel page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function excelUpdate()
    {
        return view('admin.product.update_excel');
    }


    /**
     * Process update excel
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function excelUpdatePost(Request $request)
    {
        $this->validate($request, [
            'file' => ['required', 'file']
        ]);

        /**
         * Read file excel
         */
        Excel::load($request->file('file'), function($reader) {
            $sheet = $reader->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();

            //Loop through each row of the worksheet in turn
            for ($row = 3; $row <= $highestRow; $row++){
                //  Read a row of data into an array
                $data = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
                $data = $data[0];
                $productId = $data[1] ?? 0;
                $rowData = [
                    'purchase_price' => $data[3] ?? 0,
                    'listed_price' => $data[4] ?? 0,
                    'sale_price' => $data[5] ?? 0,
                    'price' => $data[6] ?? 0,
                    'wholesale_price' => $data[7] ?? 0
                ];
                Product::where('id', $productId)->update($rowData);
            }
        })->get();

        return response()->json(['success' => true, 'message' => 'Update thành công']);
    }
}