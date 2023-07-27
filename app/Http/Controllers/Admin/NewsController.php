<?php

namespace App\Http\Controllers\Admin;

use App\Models\BaseModel;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NewsController extends ResourceController
{
    protected $model = News::class;
    protected $viewPath = 'news';
    protected $name = 'Tin tức';
    protected $route = 'news';
     protected $seo = true;


    public function index()
    {
        $listCategory = NewsCategory::pluck('name', 'id')->toArray();
        $this->data = [
            'listCategory' => $listCategory
        ];
        return parent::index();
    }


    public function create()
    {
        $listCategory = NewsCategory::pluck('name', 'id')->toArray();
        $this->data = [
            'listCategory' => $listCategory
        ];
        return parent::create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'                  => ['required'],
            'link'                  => ['required', 'unique:news,link'],
            'description'           => ['nullable', 'max:500'],
            'detail'                => ['required'],
            'status'                => ['required', Rule::in([BaseModel::STATUS_ACTIVE, BaseModel::STATUS_INACTIVE])],
            'image'                 => ['nullable', 'url'],
            'news_category_id'      => ['nullable', 'exists:news_categories,id']
        ]);
        return parent::store($request);
    }


    public function edit($id)
    {
        $listCategory = NewsCategory::pluck('name', 'id')->toArray();
        $this->data = [
            'listCategory' => $listCategory
        ];

        return parent::edit($id);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'                  => ['required'],
            'link'                  => ['required'],
            'description'           => ['nullable', 'max:500'],
            'detail'                => ['required'],
            'status'                => ['required', Rule::in([BaseModel::STATUS_ACTIVE, BaseModel::STATUS_INACTIVE])],
            'image'                 => ['nullable', 'url'],
            'news_category_id'      => ['nullable', 'exists:news_categories,id']
        ]);

        $this->updateData = [
            'name' => $request->name,
            'link' => $request->link,
            'description' => $request->description,
            'detail' => $request->detail,
            'status' => $request->status,
            'news_category_id' => $request->news_category_id,
            'image' => $request->image
        ];
        return parent::update($request, $id);
    }

}
