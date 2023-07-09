<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Http\Request;

class Partner extends BaseModel
{
    protected $fillable = [
        'name', 'link', 'image'
    ];

    public static function getList(Request $request)
    {
        $limit = $request->post('limit') ? $request->post('limit') : self::$PER_PAGE;
        return self::name($request->post('name'))
            ->status($request->post('status'))
            ->sortOrder($request)
            ->paginate($limit);
    }
}
