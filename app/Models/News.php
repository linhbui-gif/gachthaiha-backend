<?php

namespace App\Models;
use Illuminate\Http\Request;

class News extends BaseModel
{
    protected $fillable = [
        'name', 'link', 'description', 'detail', 'image', 'news_category_id',
    ];

    public function category()
    {
        return $this->belongsTo(NewsCategory::class, 'news_category_id');
    }

    public function scopeCategory($query, $categoryId)
    {
        return !empty($categoryId) ? $query->where('news_category_id', $categoryId) : $query;
    }

    public function scopeLink($query, $link)
    {
        return !empty($link) ? $query->where('link', $link) : $query;
    }

    public static function getList(Request $request)
    {
        $limit = $request->limit ? $request->limit : self::$PER_PAGE;
        return self::name($request->name)
            ->status($request->status)
            ->category($request->news_category_id)
            ->with('category')
            ->sortOrder($request)
            ->paginate($limit);
    }
}
