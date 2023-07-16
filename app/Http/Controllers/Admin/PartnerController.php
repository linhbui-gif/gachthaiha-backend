<?php

namespace App\Http\Controllers\Admin;

use App\Models\BaseModel;
use App\Models\Partner;
use App\Rules\Utf8StringRule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PartnerController extends ResourceController
{
    protected $model = Partner::class;
    protected $viewPath = 'partner';
    protected $name = 'Đối tác';
    protected $route = 'partner';


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
            'name' => ['required'],
            'link' => ['required'],
            'image' => ['required', 'url'],
            'status' => ['required', Rule::in([BaseModel::STATUS_ACTIVE, BaseModel::STATUS_INACTIVE])]
        ]);
        $this->updateData = [
            'name' => $request->name,
            'link' => $request->link,
            'image' => $request->image,
            'status' => $request->status
        ];
        return parent::update($request, $id);
    }
}
