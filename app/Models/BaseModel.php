<?php

namespace App\Models;

use App\Http\Requests\Admin\UpdateStatusRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class BaseModel extends Model
{
    use SoftDeletes;

    /**
     * Number record per page
     * @var int
     */
    public static $PER_PAGE = 10;


    const STATUS_ACTIVE             = 1;
    const STATUS_INACTIVE           = 100;
    const STATUS_PENDING            = 99;


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
     * get by name
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param $name
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeName($query, $name)
    {
        return $name ? $query->where('name', 'like', '%'.$name.'%') : $query;
    }


    /**
     * Get record active
     *
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return self::scopeStatus($query, self::STATUS_ACTIVE);
    }


    /**
     * Get record inactive
     *
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInactive($query)
    {
        return self::scopeStatus($query, self::STATUS_INACTIVE);
    }


    /**
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSortOrder($query, Request $request)
    {
        if($request->input('order') && $request->input('order_by')){
            return $query->orderBy($request->input('order_by'), $request->input('order'));
        }

        return $query;
    }



    /**
     * Update status for a record
     * @param UpdateStatusRequest $request
     * @return mixed
     */
    public static function updateStatus(UpdateStatusRequest $request)
    {
        $data = self::find($request->id);
        $data->status = $request->status;
        $data->save();
        return $data;
    }


    /**
     * Function get list default
     *
     * @param Request $request
     * @return mixed
     */
    public static function getList(Request $request)
    {
        $limit = $request->limit ? $request->limit : self::$PER_PAGE;
        return self::name($request->name)
            ->status($request->status)
            ->sortOrder($request)
            ->paginate($limit);
    }
}
