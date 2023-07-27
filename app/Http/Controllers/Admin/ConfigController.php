<?php

namespace App\Http\Controllers\Admin;

use App\Models\Config;
use Illuminate\Http\Request;
use Session;
class ConfigController extends ResourceController
{
    /**
     * Model use to perform to database
     *
     * @var string
     */
    protected $model = Config::class;

    /**
     * View path
     *
     * @var string
     */
    protected $viewPath = 'config';


    /**
     * Name
     *
     * @var string
     */
    protected $name = 'Cấu hình';


    /**
     * Route name
     *
     * @var string
     */
    protected $route = 'config';
    public function index()
    {
        $this->data['record'] = $this->model::findOrFail(14);
        return view('admin.'.$this->viewPath.'.index', $this->data);
    }
    public function store(Request $request)
    {
        $record = $this->model::create($request->input());

        if(!$record){
            return response()->json(['success' => false, 'message' => trans('admin.has_an_error_when_create')]);
        }
        $this->data['record'] = $this->model::findOrFail($record->id);
        return redirect()->route('admin.'.$this->route.'.index');
    }
    public function update(Request $request, $id)
    {
        $params = $request->all();
        unset($params['_token']);
        if(!isset($params['image'])){
            unset($params['image']);
        }
        if(!isset($params['favicon'])){
            unset($params['favicon']);
        }
        $this->updateData = $params;
        $record = $this->model::findOrFail($id);

        $this->model::where('id', $record->id)->update($this->updateData);
        Session::flash('success', 'Bạn đã cập nhật thành công');
        return redirect()->route('admin.'.$this->route.'.index');
    }
}
