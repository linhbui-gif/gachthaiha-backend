<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ResourceController;
use App\Http\Requests\Admin\CopyRequest;
use App\Models\BaseModel;
use App\Models\Menu;
use App\Models\MenuDetail;
use App\Models\News;
use App\Rules\Utf8StringRule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MenuController extends ResourceController
{
    protected $model = Menu::class;
    protected $viewPath = 'menu';
    protected $name = 'Menu';
    protected $route = 'menu';


    public function create()
    {
        $listParentMenu = [];
        $this->data = [
            'listParentMenu' => $listParentMenu
        ];
        return parent::create();
    }

    /**
     * Store menu
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'max:255'],
            'position' => ['required', Rule::in(array_keys(Menu::$listPosition))],
            'status' => ['required', Rule::in([BaseModel::STATUS_ACTIVE, BaseModel::STATUS_INACTIVE])],
            'item' => ['required', 'array'],
            'item.*' => ['required', 'array'],
            'item.*.title' => ['required', 'max:255'],
            'item.*.link' => ['required', 'max:255'],
            'item.*.position' => ['required', 'integer'],
        ]);
        $post = $request->post();

        $menu = Menu::create($post);

        if(empty($menu)){
            return response()->json(['success' => false, 'message' => 'Có lỗi trong quá trình thêm mới menu. Mời bạn thử lại']);
        }

        // save menu detail
        if(!empty($post['item'])){
            $insertItem = [];
            foreach($post['item'] as $key => $value){
                $insertItem[] = [
                    'menu_id'   => $menu->id,
                    'title'     => $value['title'],
                    'position'  => $value['position'],
                    'link'      => $value['link'],
                ];
            }
            MenuDetail::insert($insertItem);
        }

        return response()->json(['success' => true, 'message' => trans('admin.add_success'), 'url' => route('admin.menu.index')]);
    }


    public function edit($id)
    {
        $listParentMenu = MenuDetail::where('menu_id', $id)->whereNull('parent_id')->pluck('title', 'id')->toArray();
        $this->data = [
            'listParentMenu' => $listParentMenu
        ];
        return parent::edit($id);
    }

    /**
     * update a menu
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required','max:255'],
            'position' => ['required', Rule::in(array_keys(Menu::$listPosition))],
            'status' => ['required', Rule::in([BaseModel::STATUS_ACTIVE, BaseModel::STATUS_INACTIVE])],
            'item' => ['required', 'array'],
            'item.*' => ['required', 'array'],
            'item.*.title' => ['required', 'max:255'],
            'item.*.link' => ['required',  'max:255'],
            'item.*.position' => ['required', 'integer'],
        ]);
        $post = $request->post();

        $update = [
            'name' => $post['name'],
            'position' => $post['position'],
            'status' => $post['status']
        ];
        Menu::where('id', $id)->update($update);

        // save menu detail
        if(!empty($post['item'])){
            $listMenuDetail = MenuDetail::where('menu_id', $id)->pluck('id')->toArray();

            // delete item not in array
            $diff = array_diff($listMenuDetail, array_keys($post['item']));
            if(!empty($diff)){
                MenuDetail::whereIn('id', $diff)->delete();
            }


            $insertItem = [];
            foreach($post['item'] as $key => $value){
                if(in_array($key, $listMenuDetail)){
                    MenuDetail::where('id', $key)->update([
                        'menu_id'   => $id,
                        'parent_id' => $value['parent_id'],
                        'title'     => $value['title'],
                        'position'  => $value['position'],
                        'link'      => $value['link'],
                    ]);
                }else{
                    $insertItem[] = [
                        'menu_id'   => $id,
                        'parent_id' => $value['parent_id'],
                        'title'     => $value['title'],
                        'position'  => $value['position'],
                        'link'      => $value['link'],
                    ];
                }
            }
            MenuDetail::insert($insertItem);
        }else{
            MenuDetail::where('menu_id', $id)->delete();
        }


        return response()->json(['success' => true, 'message' => trans('admin.update_success'), 'url' => route('admin.menu.index')]);
    }


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

        // insert menu detail
        $listMenuDetail = MenuDetail::where('menu_id', $request->id)->get()->toArray();
        $insertMenuDetail = [];
        if(!empty($listMenuDetail)){
            foreach($listMenuDetail as $key => $value){
                $insertMenuDetail[] = [
                    'menu_id' => $insert->id,
                    'title' => $value['title'],
                    'link' => $value['link'],
                    'position' => $value['position']
                ];
            }
        }
        MenuDetail::insert($insertMenuDetail);

        return response()->json(['success' => true, 'message' => trans('admin.copy_success')]);
    }
}
