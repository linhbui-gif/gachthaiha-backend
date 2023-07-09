<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Libs\SeoLib;
use App\Models\BaseModel;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * All news
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $request->limit = 10;
        $request->order = 'desc';
        $request->order_by = 'news.id';
        $request->status = BaseModel::STATUS_ACTIVE;
        $listNews = News::getList($request);

        $latestPost = News::orderBy('id', 'DESC')->limit(4)->get();

        return view('web.news.index', compact('listNews', 'latestPost'));
    }

    /**
     * New by category
     */
    public function category($link)
    {
        $category = NewsCategory::link($link)->where('status', BaseModel::STATUS_ACTIVE)->first();
        if(empty($category)){
            abort(404);
        }

        $listCategory = NewsCategory::where('status', BaseModel::STATUS_ACTIVE)->get();

        $request = new Request();
        $request->news_category_id = $category->id;

        $listNews = News::getList($request);

        $latestPost = News::where('news_category_id', $category->id)->orderBy('id', 'DESC')->limit(4)->get();

        return view('web.news.index', compact('category', 'listNews', 'listCategory', 'latestPost'));
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
        $news = News::link($link)->where('status', BaseModel::STATUS_ACTIVE)->first();
        if(empty($news)){
            abort(404);
        }

        $otherNews = News::where('id', '<>', $news->id)
            ->where('status', BaseModel::STATUS_ACTIVE)
            ->category($news->news_category_id)->limit(8)->get();

        $latestPost = News::limit(5)->where('status', BaseModel::STATUS_ACTIVE)->orderBy('id', 'DESC')->get();

        return view('web.news.detail', [
            'news' => $news,
            'otherNews' => $otherNews,
            'latestPost' => $latestPost
        ]);
    }
}
?>
