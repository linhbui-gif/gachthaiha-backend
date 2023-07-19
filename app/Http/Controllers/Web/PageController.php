<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\BaseModel;
use App\Models\Page;

class PageController extends Controller
{
    public function detail($link)
    {
        $page = Page::link($link)->where('status', BaseModel::STATUS_ACTIVE)->first();
        if (empty($page)) {
            abort(404);
        }

        $relatePage = Page::where('status', BaseModel::STATUS_ACTIVE)
            ->limit(10)->orderBy('id', 'desc')->get();
        return view('web.page.detail', [
            'page' => $page,
            'relatePage' => $relatePage
        ]);
    }
}

?>