<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SettingController extends ResourceController
{
    /**
     * Model use to perform to database
     *
     * @var string
     */
    protected $model = Setting::class;

    /**
     * View path
     *
     * @var string
     */
    protected $viewPath = 'setting';


    /**
     * Name
     *
     * @var string
     */
    protected $name = 'Cài đặt hệ thống';


    /**
     * Route name
     *
     * @var string
     */
    protected $route = 'setting';


    /**
     * Store a record
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'setting_key' => ['required'],
            'setting_value' => ['required']
        ]);

        return parent::store($request);
    }


    /**
     * Update a record
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'setting_key' => ['required'],
            'setting_value' => ['required']
        ]);
        $this->updateData = [
            'setting_key' => $request->setting_key,
            'setting_value' => $request->setting_value,
            'type' => $request->type
        ];
        return parent::update($request, $id);
    }


    /**
     * Clear cache
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function clearCache(Request $request)
    {
        if($request->ajax()){
            Artisan::call('cache:clear');
            return response()->json(['success' => true, 'message' => 'Clear cache success']);
        }
        return response()->json(['success' => false, 'message' => 'Request not allowed']);
    }
}
