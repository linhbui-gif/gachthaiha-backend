<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProductReview extends BaseModel
{
    protected $fillable = [
        'product_id', 'name', 'point', 'review_content', 'status'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function scopeProductName($query, $filter)
    {
        if (empty($filter)) {
            return $query;
        }

        return $query->whereHas('product', function ($q) use ($filter) {
            $q->where('name', 'like', "%{$filter}%");
        });
    }

    public function scopeProductId($query, $filter)
    {
        return !empty($filter) ? $query->where('product_id', $filter) : $query;
    }

    public function scopePoint($query, $filter)
    {
        return !empty($filter) ? $query->where('point', $filter) : $query;
    }

    public static function getList(Request $request)
    {
        $limit = $request->limit ? $request->limit : self::$PER_PAGE;
        return self::name($request->name)
            ->productId($request->product_id)
            ->point($request->point)
            ->status($request->status)
            ->with('product')
            ->sortOrder($request)
            ->paginate($limit);
    }
}
