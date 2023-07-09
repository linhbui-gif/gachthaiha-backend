<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BatchProcessRequest;
use App\Http\Requests\Admin\CopyRequest;
use App\Http\Requests\Admin\DestroyRequest;
use App\Http\Requests\Admin\UpdateStatusRequest;
use Illuminate\Http\Request;

abstract class BaseController extends Controller
{
    public function index(){}
    public function search(Request $request){}
    public function create(){}
    public function store(Request $request){}
    public function show($id){}
    public function edit($id){}
    public function update(Request $request, $id){}
    public function destroy(DestroyRequest $request){}
    public function copy(CopyRequest $request){}
    public function updateStatus(UpdateStatusRequest $request){}
    public function batchProcess(BatchProcessRequest $request){}
}
?>