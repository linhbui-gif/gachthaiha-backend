<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Libs\SeoLib;
use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    /**
     * All news
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $request->limit = 11;
        $request['order_by'] = 'collections.id';
        $request['order'] = 'desc';
        $listCollection = Collection::getList($request);

        return view('web.collection.index', [
            'listCollection' => $listCollection,
        ]);
    }

    /**
     * News detail
     *
     * @param $link
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function detail($link)
    {
        $collection = Collection::link($link)->first();
        if (empty($collection)) {
            abort(404);
        }

        $listProduct = Product::where('collection_id', $collection->id)->orderBy('id', 'desc')->paginate(12);

        return view('web.collection.detail', [
            'collection' => $collection,
            'listProduct' => $listProduct
        ]);
    }
}

?>