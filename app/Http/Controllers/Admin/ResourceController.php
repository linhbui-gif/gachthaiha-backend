<?php
namespace App\Http\Controllers\Admin;

use App\BatchAction;
use App\Http\Requests\Admin\BatchProcessRequest;
use App\Http\Requests\Admin\CopyRequest;
use App\Http\Requests\Admin\DestroyRequest;
use App\Http\Requests\Admin\UpdateStatusRequest;
use App\Libs\SeoLib;
use App\Models\BaseModel;
use App\Models\Seo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ResourceController extends BaseController
{
    /**
     * Model use to perform to database
     *
     * @var Model
     */
    protected $model;

    /**
     * View path use to render to view
     *
     * @var string
     */
    protected $viewPath;


    /**
     * Name of resource
     *
     * @var string
     */
    protected $name;


    /**
     * Router name
     *
     * @var string
     */
    protected $route;


    /**
     * Seo
     *
     * @var bool
     */
    protected $seo = false;


    /**
     * data show to view and data update
     *
     * @var array
     */
    protected $data = [], $updateData = [];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.'.$this->viewPath.'.index', $this->data);
    }


    /**
     * Search
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function search(Request $request)
    {
        $listData = $this->model::getList($request);
        $html = view('admin.'.$this->viewPath.'.search', compact('listData', 'request'));
        return response()->json(['success' => true, 'message' => trans('admin.success'), 'html' => $html->render()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['pageTitle'] = 'Thêm mới '.mb_strtolower($this->name);
        return view('admin.'.$this->viewPath.'.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $record = $this->model::create($request->input());

        if(!$record){
            return response()->json(['success' => false, 'message' => trans('admin.has_an_error_when_create')]);
        }

        if($this->seo){
            SeoLib::SEOSave($request, $record->id, $this->model);
        }

        return response()->json(['success' => true, 'message' => trans('admin.add_success'), 'url' => route('admin.'.$this->route.'.index')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record = $this->model::findOrFail($id);
        $this->data['record'] = $record;
        $this->data['pageTitle'] = $this->name;
        return view('admin.'.$this->viewPath.'.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = $this->model::findOrFail($id);
        $this->data['pageTitle'] = 'Sửa '.mb_strtolower($this->name);
        $this->data['record'] = $record;

        if($this->seo){
            $seo = Seo::where('type', $this->model)->where('object_id', $id)->first();
            $this->data['seo'] = $seo;
        }

        return view('admin.'.$this->viewPath.'.create', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // get record from db
        $record = $this->model::findOrFail($id);

        $this->model::where('id', $record->id)->update($this->updateData);

        if($this->seo){
            SeoLib::SEOSave($request, $record->id, $this->model);
        }

        return response()->json(['success' => true, 'message' => trans('admin.update_success'), 'url' => route('admin.'.$this->route.'.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyRequest $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyRequest $request)
    {
        // find record by id
        $record = $this->model::findOrFail($request->id);

        // check record empty
        if (empty($record)) {
            return response()->json(['success' => false, 'message' => trans('admin.record_not_exists')]);
        }

        // try to delete record
        if (!$record->delete()) {
            return response()->json(['success' => false, 'message' => trans('admin.delete_error')]);
        }

        // return to frontend
        return response()->json(['success' => true, 'message' => trans('admin.delete_success')]);
    }


    /**
     * Copy a record
     *
     * @param CopyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function copy(CopyRequest $request)
    {
        $record = $this->model::findOrFail($request->id);

        if (empty($record)) {
            return response()->json(['success' => false, 'message' => trans('admin.record_not_exists')]);
        }

        $insert = $this->model::create($record->toArray());
        if (!$insert) {
            return response()->json(['success' => false, 'message' => trans('admin.copy_error')]);
        }

        return response()->json(['success' => true, 'message' => trans('admin.copy_success')]);
    }


    /**
     * Update status of record
     *
     * @param UpdateStatusRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStatus(UpdateStatusRequest $request)
    {
        $update = $this->model::updateStatus($request);
        if ($update) {
            return response()->json(['success' => true, 'message' => trans('admin.update_success')]);
        }

    }


    /**
     * Process in much of record
     *
     * @param BatchProcessRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function batchProcess(BatchProcessRequest $request)
    {
        switch ($request->action) {
            case BatchAction::ACTIVE:
                $this->model::whereIn('id', $request->check)->update(['status' => BaseModel::STATUS_ACTIVE]);
                break;

            case BatchAction::INACTIVE:
                $this->model::whereIn('id', $request->check)->update(['status' => BaseModel::STATUS_INACTIVE]);
                break;

            case BatchAction::DELETE:
                $this->model::whereIn('id', $request->check)->delete();
                break;

        }

        return response()->json(['success' => true, 'message' => trans('admin.process_success')]);
    }
}
?>