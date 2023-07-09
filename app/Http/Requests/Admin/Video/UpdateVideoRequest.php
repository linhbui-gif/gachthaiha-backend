<?php

namespace App\Http\Requests\Admin\Video;

use App\Models\BaseModel;
use App\Models\VideoCategory;
use App\Rules\Utf8StringRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateVideoRequest extends FormRequest
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
        $listCategory = VideoCategory::pluck('id')->toArray();
        return [
            'name' => ['required', new Utf8StringRule(), 'max:255'],
            'link' => ['required', 'max:255'],
            'description' => ['nullable', 'max:500'],
            'content' => ['nullable', '10000'],
            'image' => ['nullable', 'url'],
            'video_category_id' => ['nullable', Rule::in($listCategory)],
            'status' => ['required', Rule::in(BaseModel::STATUS_ACTIVE, BaseModel::STATUS_INACTIVE)]
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Tiêu đề video',
            'link' => 'Đường dẫn video',
            'avatar' => 'Ảnh đại diện video',
            'description' => 'Mô tả video',
            'content' => 'Nội dung video',
            'video_category_id' => 'Danh mục video',
            'status' => 'Trạng thái'
        ];
    }
}
