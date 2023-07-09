<?php

namespace App\Http\Controllers\Admin;

use App\Models\BaseModel;
use App\Models\Subscription;
use App\Rules\Utf8StringRule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubscriptionController extends ResourceController
{
    protected $model = Subscription::class;
    protected $viewPath = 'subscription';
    protected $name = 'Email đăng ký nhận tin';
    protected $route = 'subscription';


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
            'name' => ['nullable', new Utf8StringRule()],
            'email' => ['required', 'email'],
            'status' => ['nullable', Rule::in([BaseModel::STATUS_ACTIVE, BaseModel::STATUS_INACTIVE])]
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
            'name' => ['nullable', new Utf8StringRule()],
            'email' => ['required', 'email'],
            'status' => ['nullable', Rule::in([BaseModel::STATUS_ACTIVE, BaseModel::STATUS_INACTIVE])]
        ]);
        $this->updateData = [
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status
        ];
        return parent::update($request, $id);
    }
}
