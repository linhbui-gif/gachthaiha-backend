<?php

namespace App\Http\Controllers\Web;

use App\Libs\CommonLib;
use App\Libs\SeoLib;
use App\Models\BaseModel;
use App\Models\Collection;
use App\Models\Contact;
use App\Models\News;
use App\Models\Page;
use App\Http\Controllers\Controller;
use App\Libs\WebLib;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Setting;
use App\Models\Subscription;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $banner = WebLib::getMainBanner();

        $newestProduct = Product::orderBy('id', 'desc')->where('status', BaseModel::STATUS_ACTIVE)->limit(12)->get();
        $promoteProduct = Product::orderBy('id', 'desc')->where('status', BaseModel::STATUS_ACTIVE)->limit(12)->get();
        $hotProduct = Product::orderBy('id', 'desc')->where('status', BaseModel::STATUS_ACTIVE)->limit(12)->get();

        $hotNews = News::orderBy('id', 'DESC')->limit(6)->get();
        $listNews = News::orderBy('id', 'DESC')->limit(6)->offset(4)->get();

        $hotProductCategory = ProductCategory::orderBy('id', 'DESC')->where('is_hot', BaseModel::STATUS_ACTIVE)->limit(3)->get();

        return view('web.home.index', compact('banner', 'newestProduct', 'hotProduct', 'promoteProduct', 'hotNews', 'listNews', 'hotProductCategory'));
    }


    public function search(Request $request)
    {
        $listProduct = Product::where('name', 'like', '%' . $request->get('query') . '%')
            ->where('status', BaseModel::STATUS_ACTIVE)
            ->orderBy('id', 'desc')->limit(12)->get();

        $listNews = News::where('name', 'like', '%' . $request->get('query') . '%')
            ->where('status', BaseModel::STATUS_ACTIVE)
            ->orderBy('id', 'desc')->limit(12)->get();

        return view('web.home.search', [
            'listProduct' => $listProduct,
            'listNews' => $listNews
        ]);
    }


    /**
     * Contact page
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function contact(Request $request)
    {
        $post = $request->post();
        if (!empty($post)) {
            $validator = Validator::make($post, [
                'name' => 'required',
                'phone' => 'required',
                'content' => 'nullable'
            ]);
            if ($validator->fails()) {
                return response()->json(['success' => false, 'message' => CommonLib::getValidationError($validator)]);
            }

            $insert = [
                'name' => $post['name'],
                'phone' => $post['phone'],
                'content' => !empty($post['content']) ? $post['content'] : ''
            ];

            $contact = Contact::create($insert);

            if (empty($contact)) {
                return response()->json(['success' => false, 'message' => 'Có lỗi trong quá trình gửi liên hệ. Mời bạn thử lại sau']);
            }

            return response()->json([
                'success' => true, 'message' => 'Gửi liên hệ thành công. Chúng tôi sẽ kiểm tra và liên hệ lại với bạn ngay.'
            ]);
        }
        return view('web.home.contact');
    }


    /**
     * About page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about()
    {
        $aboutPageId = WebLib::getSetting(Setting::ID_ABOUT_PAGE);
        if (empty($aboutPageId)) {
            abort(404);
        }
        $aboutPage = Page::find($aboutPageId);

        return view('web.home.about', ['page' => $aboutPage]);
    }


    /**
     * Function subscription
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function subscription(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email'
        ]);

        $subscription = Subscription::create(['email' => $request->email]);

        if (empty($subscription)) {
            return response()->json([
                'success' => false, 'message' => 'Có lỗi trong quá trình xử lý. Mời bạn thử lại sau'
            ]);
        }

        return response()->json([
            'success' => true, 'message' => 'Cảm ơn, bạn đã đăng ký thành công'
        ]);
    }
}

?>
