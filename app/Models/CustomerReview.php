<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Http\Request;

class CustomerReview extends BaseModel
{
    protected $fillable = [
        'customer_name', 'position', 'company', 'image', 'content', 'status'
    ];

    public function scopeCustomerName($query, $name)
    {
        return $name ? $query->where('customer_name', 'like', '%'.$name.'%') : $query;
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public static function getList(Request $request)
    {
        $limit = $request->post('limit') ? $request->post('limit') : self::$PER_PAGE;
        return self::customerName($request->customer_name)
            ->status($request->status)
            ->sortOrder($request)
            ->paginate($limit);
    }

}
