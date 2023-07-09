<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\NewsCategory\CreateNewsCategoryRequest;
use App\Models\BaseModel;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NewsCategoryController extends ResourceController
{
    protected $model = NewsCategory::class;
    protected $viewPath = 'news_category';
    protected $name = 'Danh mục tin tức';
    protected $route = 'news_category';
    // protected $seo = true;


    /**
     * Index page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listParent = NewsCategory::pluck('name', 'id')->toArray();
        $this->data = [
            'listParent' => $listParent
        ];
        return parent::index();
    }


    /**
     * Create page
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listParent = NewsCategory::pluck('name', 'id')->toArray();
        $this->data = [
            'listParent' => $listParent
        ];
        return parent::create();
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
        $this->validate($request,
            (new CreateNewsCategoryRequest())->rules(),
            [],
            (new CreateNewsCategoryRequest())->attributes()
        );

        return parent::store($request);
    }

    /**
     * Function show a category
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listParent = NewsCategory::pluck('name', 'id')->toArray();
        $this->data['listParent'] = $listParent;
        return parent::show($id);
    }


    /**
     * Edit page, edit a category
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listParent = NewsCategory::pluck('name', 'id')->toArray();
        $this->data = [
            'pageTitle' => 'Sửa danh mục tin tức',
            'listParent' => $listParent
        ];
        return parent::edit($id);
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
            'parent_id' => ['nullable', 'exists:news_categories,id'],
            'image' => ['nullable', 'url'],
            'is_hot' => ['required', Rule::in([BaseModel::STATUS_ACTIVE, BaseModel::STATUS_INACTIVE])],
            'description' => ['nullable']
        ]);
        $this->updateData = [
            'name' => $request->name,
            'link' => $request->link,
            'parent_id' => $request->parent_id ?? null,
            'image' => $request->image,
            'is_hot' => $request->is_hot,
            'description' => $request->description
        ];
        return parent::update($request, $id);
    }
}
