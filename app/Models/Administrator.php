<?php

namespace App\Models;

use App\Http\Requests\Admin\UpdateStatusRequest;
use App\Notifications\Admin\Auth\ResetPasswordNotification;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class Administrator extends Authenticatable
{
    use HasRoles;
    use SoftDeletes;
    use Notifiable;

    protected $guard_name = 'admin';

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    public static $PER_PAGE = 30;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send password reset notification
     *
     * @param string $token
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * filter by name
     *
     * @param $query
     * @param $name
     * @return mixed
     */
    public function scopeName($query, $name)
    {
        return !empty($name) ? $query->where('name', 'like', '%'.$name.'%') : $query;
    }

    /**
     * Filter by email
     *
     * @param $query
     * @param $email
     * @return mixed
     */
    public function scopeEmail($query, $email)
    {
        return !empty($email) ? $query->where('email', 'like', '%'.$email.'%') : $query;
    }

    /**
     * Filter by status
     *
     * @param $query
     * @param $status
     * @return mixed
     */
    public function scopeStatus($query, $status)
    {
        return !empty($status) ? $query->where('status', $status) : $query;
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
     * Get list
     *
     * @param Request $request
     * @return mixed
     */
    public static function getList(Request $request)
    {
        $limit = $request->post('limit') ? $request->post('limit') : self::$PER_PAGE;
        return self::name($request->name)
            ->email($request->email)
            ->sortOrder($request)
            ->paginate($limit);
    }
}
