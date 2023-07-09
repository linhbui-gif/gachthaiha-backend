<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductCategory\CreateProductCategoryRequest;
use App\Http\Requests\Admin\ProductCategory\UpdateProductCategoryRequest;
use App\Models\CategorySize;
use App\Models\ProductCategory;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends ResourceController
{
    protected $model = Size::class;
    protected $viewPath = 'size';
    protected $name = 'Kích thước';
    protected $route = 'size';

    public function __construct()
    {
        $listCategories = ProductCategory::pluck('name', 'id')->toArray();
        $this->data['listCategory'] = $listCategories;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'max:255'],
            'category_id' => ['nullable', 'array']
        ]);

        /**
         * Insert to size table
         */
        $record = $this->model::create($request->input());

        /**
         * Insert to size category
         */
        if(!empty($request->category_id)){
            $insertRelation = [];
            foreach($request->category_id as $key => $value){
                $insertRelation[] = [
                    'size_id' => $record->id,
                    'category_id' => $key
                ];
            }
            CategorySize::insert($insertRelation);
        }


        return response()->json(['success' => true, 'message' => trans('admin.add_success'), 'url' => route('admin.'.$this->route.'.index')]);
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
            'status' => $request->status
        ];

        CategorySize::where('size_id', $id)->delete();

        if(!empty($request->category_id)){
            $insertRelation = [];
            foreach($request->category_id as $key => $value){
                $insertRelation[] = [
                    'size_id' => $id,
                    'category_id' => $key
                ];
            }
            CategorySize::insert($insertRelation);
        }


        return parent::update($request, $id);
    }
}
?>
