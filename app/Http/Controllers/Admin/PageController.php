<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use App\Models\BaseModel;
use App\Rules\Utf8StringRule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PageController extends ResourceController
{
    protected $model = Page::class;
    protected $viewPath = 'page';
    protected $name = 'Trang';
    protected $route = 'page';
    /*protected $seo = true;*/


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
            'name' => ['required', new Utf8StringRule()],
            'link' => ['required'],
            'image' => ['required', 'url'],
            'description' => ['nullable'],
            'detail' => ['required'],
            'status' => ['required', Rule::in([BaseModel::STATUS_ACTIVE, BaseModel::STATUS_INACTIVE])]
        ]);

        return parent::store($request);
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
            'name' => ['required', new Utf8StringRule()],
            'link' => ['required'],
            'image' => ['required', 'url'],
            'description' => ['nullable'],
            'detail' => ['required'],
            'status' => ['required', Rule::in([BaseModel::STATUS_ACTIVE, BaseModel::STATUS_INACTIVE])]
        ]);
        $this->updateData = [
            'name' => $request->name,
            'link' => $request->link,
            'image' => $request->image,
            'status' => $request->status,
            'description' => $request->description,
            'detail' => $request->detail
        ];
        return parent::update($request, $id);
    }
}
