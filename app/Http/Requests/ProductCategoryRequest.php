<?php

namespace App\Http\Requests;

use App\Models\ProductCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductCategoryRequest extends SearchBaseRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

        ];
    }

    public function getPostData()
    {
        $post = $this->post();
        return $post;
    }

    /**
     * Function get order
     * @return string
     */
    public function getOrder()
    {
        if($this->post('order') && strtolower($this->post('order')) == 'asc'){
            return 'ASC';
        }

        return 'DESC';
    }

    /**
     * Function get order by
     */
    public function getOrderBy()
    {
        $orderByField = ['product_categories.id', 'product_categories.name', 'product_categories.status'];
        if($this->post('order_by') && in_array(strtolower($this->post('order_by')), $orderByField)){
            return $this->post('order_by');
        }

        return 'product_categories.id';
    }
}
