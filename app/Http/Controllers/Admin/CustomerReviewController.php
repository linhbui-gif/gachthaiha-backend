<?php

namespace App\Http\Controllers\Admin;

use App\Models\BaseModel;
use App\Models\CustomerReview;
use App\Rules\Utf8StringRule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CustomerReviewController extends ResourceController
{
    protected $model = CustomerReview::class;
    protected $viewPath = 'customer_review';
    protected $name = 'Đánh giá của khách hàng';
    protected $route = 'customer_review';


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
            'customer_name' => ['required', 'max:255'],
            'position' => ['required','max:255'],
            'company' => ['required','max:255'],
            'image' => ['required', 'url', 'max:255'],
            'status' => ['required', Rule::in([BaseModel::STATUS_ACTIVE, BaseModel::STATUS_ACTIVE])],
            'content' => ['required']
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
            'customer_name' => ['required','max:255'],
            'position' => ['required','max:255'],
            'company' => ['required','max:255'],
            'image' => ['required', 'url', 'max:255'],
            'status' => ['required', Rule::in([BaseModel::STATUS_ACTIVE, BaseModel::STATUS_ACTIVE])],
            'content' => ['required']
        ]);
        $this->updateData = [
            'customer_name' => $request->customer_name,
            'position' => $request->position,
            'company' => $request->company,
            'image' => $request->image,
            'status' => $request->status,
            'content' => $request->post('content'),
        ];
        return parent::update($request, $id);
    }
}
