<?php

namespace App\Models;

use App\Models\BaseModel;

class Page extends BaseModel
{
    protected $fillable = [
        'name', 'link', 'description', 'detail', 'status', 'image'
    ];

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
}
