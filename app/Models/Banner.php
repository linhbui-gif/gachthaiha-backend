<?php

namespace App\Models;

use App\Http\Requests\Admin\Banner\BannerSearchRequest;
use App\Http\Requests\Admin\Banner\UpdateStatusRequest;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Banner extends BaseModel
{
    use SoftDeletes;

    const POSITION_MAIN = 'position_main';

    public static $listPosition = [
        self::POSITION_MAIN => 'Banner chính'
    ];


    /**
     * Fillable data
     *
     * @var array
     */
    protected $fillable = ['name', 'status', 'position'];


    /**
     * Relation to detail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detail()
    {
        return $this->hasMany(BannerDetail::class);
    }


    /**
     * Get by status
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  mixed $status
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeStatus($query, $status)
    {
        return $status ? $query->where('status', $status) : $query;
    }


    /**
     * Get by name
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  mixed $name
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeName($query, $name)
    {
        return $name ? $query->where('name', 'like', '%'.$name.'%') : $query;
    }


    public function scopePosition($query, $position)
    {
        return $position ? $query->where('position', $position) : $query;
    }


    /**
     * Get list data
     *
     * @param Request $request
     * @return mixed
     */
    public static function getList(Request $request)
    {
        $limit = $request->post('limit') ? $request->post('limit') : self::$PER_PAGE;
        return self::name($request->post('name'))
            ->status($request->post('status'))
            ->position($request->position)
            ->sortOrder($request)
            ->paginate($limit);
    }


    /**
     * Get a record
     *
     * @param int $id
     * @return mixed
     */
    public static function getDetail(int $id)
    {
        return self::find($id);
    }

}
