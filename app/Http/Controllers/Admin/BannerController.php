<?php

namespace App\Http\Controllers\Admin;

use App\BatchAction;
use App\Http\Requests\Admin\Banner\BannerSearchRequest;
use App\Http\Requests\Admin\Banner\BatchProcessRequest;
use App\Http\Requests\Admin\Banner\CopyRequest;
use App\Http\Requests\Admin\Banner\CreateBannerRequest;
use App\Http\Requests\Admin\Banner\UpdateStatusRequest;
use App\Models\BaseModel;
use App\Models\Banner;
use App\Models\BannerDetail;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.banner.index');
    }


    /**
     * Search
     * @param BannerSearchRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function search(BannerSearchRequest $request)
    {
        $listData = Banner::getList($request);
        $html = view('admin.banner.search', compact('listData', 'request'));
        return response()->json(['success' => true, 'message' => trans('admin.success'), 'html' => $html->render()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateBannerRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateBannerRequest $request)
    {
        $input = $request->validated();
        $banner = Banner::create($input);

        // insert banner detail
        BannerDetail::insertBannerDetail($request, $banner->id);

        if(!$banner){
            return response()->json(['success' => false, 'message' => trans('admin.has_an_error_when_create')]);
        }

        return response()->json(['success' => true, 'message' => trans('admin.add_success'), 'url' => route('admin.banner.index')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banner.show', ['banner' => $banner, 'pageTitle' => trans('admin.banner')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banner.create', [
            'banner' => $banner,
            'pageTitle' => trans('admin.edit_banner')
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CreateBannerRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateBannerRequest $request, $id)
    {
        // get record from db
        $banner = Banner::findOrFail($id);

        // get input from request
        $input = $request->validated();

        // set update array & update data
        $updateBanner = [
            'name' => $input['name'],
            'position' => $input['position'],
            'status' => $input['status']
        ];
        Banner::where('id', $banner->id)->update($updateBanner);

        // update banner detail
        BannerDetail::where('banner_id', $banner->id)->delete();

        // reinsert data to db
        BannerDetail::insertBannerDetail($request, $banner->id);

        return response()->json(['success' => true, 'message' => trans('admin.update_success'), 'url' => route('admin.banner.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CopyRequest $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(CopyRequest $request)
    {
        // find banner by id
        $banner = Banner::findOrFail($request->id);

        // check banner empty
        if (empty($banner)) {
            return response()->json(['success' => false, 'message' => trans('admin.record_not_exists')]);
        }

        // try to delete banner
        if (!$banner->delete()) {
            return response()->json(['success' => false, 'message' => trans('admin.delete_error')]);
        }

        // try to delete banner detail
        BannerDetail::where('banner_id', $banner->id)->delete();

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
        $record = Banner::findOrFail($request->id);

        if (empty($record)) {
            return response()->json(['success' => false, 'message' => trans('admin.record_not_exists')]);
        }

        $insert = Banner::create($record->toArray());
        if (!$insert) {
            return response()->json(['success' => false, 'message' => trans('admin.copy_error')]);
        }

        // insert banner detail



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
        $update = Banner::updateStatus($request);
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
                Banner::whereIn('id', $request->check)->update(['status' => BaseModel::STATUS_ACTIVE]);
                break;

            case BatchAction::INACTIVE:
                Banner::whereIn('id', $request->check)->update(['status' => BaseModel::STATUS_INACTIVE]);
                break;

            case BatchAction::DELETE:
                Banner::whereIn('id', $request->check)->delete();
                break;

        }

        return response()->json(['success' => true, 'message' => trans('admin.process_success')]);
    }
}
