<?php

namespace App\Models;


use Illuminate\Http\Request;

class ProductCategory extends BaseModel
{
    protected $fillable = [
        'name', 'link', 'image', 'description', 'parent_id', 'status', 'is_hot'
    ];

    public function parent()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function child()
    {
        return $this->hasMany(ProductCategory::class, 'parent_id', 'id');
    }

    public function size()
    {
        return $this->belongsToMany(
            Size::class,
            'category_sizes',
            'category_id',
            'size_id',
            'id');
    }

    public function brand()
    {
        return $this->belongsToMany(Brand::class, 'brand_categories', 'category_id', 'brand_id');
    }

    /**
     * Filter by Brand ID
     *
     * @param $query
     * @param $filter
     * @return mixed
     */
    public function scopeBrandId($query, $filter)
    {
        if (empty($filter)) {
            return $query;
        }

        return $query->whereHas('brand', function($q) use ($filter){
            if(is_array($filter)){
                $q->whereIn('brand_id', $filter);
            }else{
                $q->where('brand_id', $filter);
            }
        });
    }

    public function scopeParentId($query, $parentId)
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
            ->parentId($request->parent_id)
            ->with('parent')
            ->sortOrder($request)
            ->paginate($limit);
    }
}
