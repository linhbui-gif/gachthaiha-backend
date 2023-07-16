<?php

namespace App\Http\Controllers\Admin;

use App\Models\BaseModel;
use App\Models\Brand;
use App\Models\BrandCategory;
use App\Models\ProductCategory;
use App\Rules\Utf8StringRule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BrandController extends ResourceController
{
    protected $model = Brand::class;
    protected $viewPath = 'brand';
    protected $name = 'Hãng gạch';
    protected $route = 'brand';

    public function __construct()
    {
        $listCategories = ProductCategory::pluck('name', 'id')->toArray();
        $this->data['listCategory'] = $listCategories;
    }


    /**
     * Store a record
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
            'link' => ['required'],
            'image' => ['required', 'url'],
            'status' => ['required', Rule::in([BaseModel::STATUS_ACTIVE, BaseModel::STATUS_INACTIVE])],
            'type' => ['required', Rule::in(array_keys(Brand::$listType))],
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
                    'brand_id' => $record->id,
                    'category_id' => $key
                ];
            }
            BrandCategory::insert($insertRelation);
        }


        return response()->json(['success' => true, 'message' => trans('admin.add_success'), 'url' => route('admin.'.$this->route.'.index')]);
    }


    /**
     * Update a record
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required'],
            'link' => ['required'],
            'image' => ['required', 'url'],
            'status' => ['required', Rule::in([BaseModel::STATUS_ACTIVE, BaseModel::STATUS_INACTIVE])]
        ]);
        $this->updateData = [
            'name' => $request->name,
            'link' => $request->link,
            'image' => $request->image,
            'status' => $request->status,
            'type' => $request->type,
        ];

        BrandCategory::where('brand_id', $id)->delete();
        if(!empty($request->category_id)){
            $insertRelation = [];
            foreach($request->category_id as $key => $value){
                $insertRelation[] = [
                    'brand_id' => $id,
                    'category_id' => $key
                ];
            }
            BrandCategory::insert($insertRelation);
        }

        return parent::update($request, $id);
    }
}
