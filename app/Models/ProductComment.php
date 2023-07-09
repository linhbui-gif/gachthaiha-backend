<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProductComment extends BaseModel
{
    protected $fillable = [
        'product_id', 'parent_id', 'name', 'phone', 'email', 'comment', 'status'
    ];

    public function child()
    {
        return $this->hasMany(ProductComment::class, 'parent_id', 'id');
    }

    public function scopeProductId($query, $filter)
    {
        return !empty($filter) ? $query->where('product_id', $filter) : $query;
    }

    public static function getList(Request $request)
    {
        $limit = $request->limit ? $request->limit : self::$PER_PAGE;
        return self::name($request->name)
            ->productId($request->product_id)
            ->status($request->status)
            ->sortOrder($request)
            ->paginate($limit);
    }

}
