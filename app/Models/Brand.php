<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Http\Request;

class Brand extends BaseModel
{
    const TYPE_SELLING = 1;
    const TYPE_COMMON = 2;
    const TYPE_OTHER = 3;

    public static $listType = [
        self::TYPE_SELLING => 'Bán chạy',
        self::TYPE_COMMON => 'Phổ biến',
        self::TYPE_OTHER => 'Khác'
    ];

    protected $fillable = [
        'name', 'link', 'image', 'status', 'type'
    ];

    public function category()
    {
        return $this->belongsToMany(
            ProductCategory::class,
            'brand_categories',
            'brand_id',
            'category_id',
            'id');
    }

    public function scopeLink($query, $filter)
    {
        return !empty($filter) ? $query->where('link', $filter) : $query;
    }

    public function scopeType($query, $filter)
    {
        return !empty($filter) ? $query->where('type', $filter) : $query;
    }

    public function scopeCategoryId($query, $filter)
    {
        return !empty($filter) ? $query->whereHas('category', function ($q) use ($filter) {
            $q->where('category_id', $filter);
        }) : $query;
    }

    public static function getList(Request $request)
    {
        $limit = $request->post('limit') ? $request->post('limit') : self::$PER_PAGE;
        return self::name($request->post('name'))
            ->status($request->post('status'))
            ->sortOrder($request)
            ->paginate($limit);
    }
}
