<?php

namespace App\Models;

use Illuminate\Http\Request;

class NewsCategory extends BaseModel
{
    protected $fillable = [
        'name', 'link', 'image', 'description', 'parent_id', 'is_hot', 'status'
    ];

    public function parent()
    {
        return $this->belongsTo(NewsCategory::class);
    }

    public function scopeParent($query, $parentId)
    {
        return !empty($parentId) ? $query->where('parent_id', $parentId) : $query;
    }

    public function scopeLink($query, $link)
    {
        return !empty($link) ? $query->where('link', $link) : $query;
    }

    public static function getList(Request $request)
    {
        $limit = $request->post('limit') ? $request->post('limit') : self::$PER_PAGE;
        return self::name($request->name)
            ->status($request->status)
            ->parent($request->parent_id)
            ->with('parent')
            ->sortOrder($request)
            ->paginate($limit);
    }
}
