<?php

namespace App\Models;

use Illuminate\Http\Request;

class Product extends BaseModel
{
    protected $fillable = [
        'sku', 'name', 'link', 'description', 'detail', 'image', 'feature_image', 'category_id',
        'price', 'sale_price', 'wholesale_price', 'size_id', 'type_id', 'surface_id', 'brand_id'
    ];

    /**
     * Set price attribute
     *
     * @param $value
     */
    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = str_replace([',', '.'], '', $value);
    }


    /**
     * Set sale price attribute
     *
     * @param $value
     */
    public function setSalePriceAttribute($value)
    {
        $this->attributes['sale_price'] = str_replace([',', '.'], '', $value);
    }

    public function setPurchasePriceAttribute($value)
    {
        $this->attributes['purchase_price'] = str_replace([',', '.'], '', $value);
    }

    public function setWholesalePriceAttribute($value)
    {
        $this->attributes['wholesale_price'] = str_replace([',', '.'], '', $value);
    }


    /**
     * Set feature image attribute
     *
     * @param $value
     */
    public function setFeatureImageAttribute($value)
    {
        $this->attributes['feature_image'] = is_array($value) ? json_encode($value) : $value;
    }


    /**
     * Relation to category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }

    public function type()
    {
        return $this->belongsTo(ProductType::class, 'type_id');
    }

    public function surface()
    {
        return $this->belongsTo(ProductSurface::class, 'surface_id');
    }

    public function comment()
    {
        return $this->hasMany(ProductComment::class, 'product_id', 'id');
    }

    public function review()
    {
        return $this->hasMany(ProductReview::class, 'product_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    /**
     * Get price of product
     *
     * @return mixed
     */
    public function getPrice()
    {
        return $this->sale_price ? $this->sale_price : $this->price;
    }

    /**
     * Filter by category
     *
     * @param $query
     * @param $categoryId
     * @return mixed
     */
    public function scopeCategory($query, $categoryId)
    {
        return !empty($categoryId)
            ? (is_array($categoryId) ? $query->whereIn('category_id', $categoryId) : $query->where('category_id', $categoryId))
            : $query;
    }

    public function scopeCategoryId($query, $categoryId)
    {
        return $this->scopeCategory($query, $categoryId);
    }

    public function scopeSizeId($query, $filter)
    {
        return !empty($filter)
            ? (is_array($filter) ? $query->whereIn('size_id', $filter) : $query->where('size_id', $filter))
            : $query;
    }

    /**
     * Filter by link
     *
     * @param $query
     * @param $link
     * @return mixed
     */
    public function scopeLink($query, $link)
    {
        return !empty($link) ? $query->where('link', $link) : $query;
    }

    public function scopeTypeId($query, $filter)
    {
        return !empty($filter)
            ? (is_array($filter) ? $query->whereIn('type_id', $filter) : $query->where('type_id', $filter))
            : $query;
    }

    public function scopeSurfaceId($query, $filter)
    {
        return !empty($filter)
            ? (is_array($filter) ? $query->whereIn('surface_id', $filter) : $query->where('surface_id', $filter))
            : $query;
    }

    public function scopeFromPrice($query, $filter)
    {
        return !empty($filter) ? $query->where('price', '>=', $filter) : $query;
    }

    public function scopeToPrice($query, $filter)
    {
        return !empty($filter) ? $query->where('price', '<=', $filter) : $query;
    }

    public function scopeBrandId($query, $filter)
    {
        return !empty($filter)
            ? (is_array($filter) ? $query->whereIn('brand_id', $filter) : $query->where('brand_id', $filter))
            : $query;
    }

    /**
     * Get list product
     *
     * @param Request $request
     * @return mixed
     */
    public static function getList(Request $request)
    {
        $limit = $request->limit ? $request->limit : self::$PER_PAGE;
        return self::name($request->name)
            ->sizeId($request->size_id)
            ->status($request->status)
            ->category($request->category_id)
            ->typeId($request->type_id)
            ->surfaceId($request->surface_id)
            ->fromPrice($request->from_price)
            ->toPrice($request->to_price)
            ->brandId($request->brand_id)
            ->with('category')
            ->sortOrder($request)
            ->paginate($limit);
    }
}
