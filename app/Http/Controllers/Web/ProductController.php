<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Libs\WebLib;
use App\Models\BaseModel;
use App\Models\Brand;
use App\Models\Comment;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductComment;
use App\Models\ProductReview;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * List product
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $listProduct = Product::orderBy('id', 'desc')
            ->where('status', BaseModel::STATUS_ACTIVE)->paginate(12);


        $newestProduct = Product::orderBy('id', 'desc')
            ->where('status', BaseModel::STATUS_ACTIVE)->limit(3)->get();

        return view('web.product.index', compact('listProduct', 'newestProduct'));
    }


    /**
     * Filter product
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function filter(Request $request)
    {
        $request->status = BaseModel::STATUS_ACTIVE;
        $listProduct = Product::getList($request);

        $html = view('web.product.ajax_filter', compact('listProduct'));
        return response()->json([
            'success' => true, 'message' => 'Fiter success',
            'html' => $html->render()
        ]);
    }


    /**
     * Product category
     *
     * @param $link
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category($link)
    {
        $category = ProductCategory::link($link)
            ->where('status', BaseModel::STATUS_ACTIVE)->first();

        if (empty($category)) {
            abort(404);
        }

        $listProduct = Product::categoryId($category->id)->where('status', BaseModel::STATUS_ACTIVE)->orderBy('id', 'desc')->paginate(12);

        $newestProduct = Product::orderBy('id', 'desc')
            ->where('status', BaseModel::STATUS_ACTIVE)->limit(3)->get();

        return view('web.product.index', compact('listProduct', 'category', 'newestProduct'));
    }


    /**
     * Get product by brand
     *
     * @param $link
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function brand($link)
    {
        $brand = Brand::link($link)
            ->where('status', BaseModel::STATUS_ACTIVE)->first();

        if (empty($brand)) {
            abort(404);
        }

        $listProduct = Product::brandId($brand->id)->where('status', BaseModel::STATUS_ACTIVE)->orderBy('id', 'desc')->paginate(12);

        $newestProduct = Product::orderBy('id', 'desc')
            ->where('status', BaseModel::STATUS_ACTIVE)->limit(3)->get();

        $isBrandPage = true;

        return view('web.product.index', compact('listProduct', 'brand', 'newestProduct', 'isBrandPage'));
    }


    /**
     * Detail of a product
     *
     * @param $link
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail($link)
    {
        $product = Product::link($link)
            ->with(['category', 'size', 'type', 'surface', 'comment', 'review', 'brand'])
            ->first();

        if (empty($product)) {
            abort(404);
        }

        WebLib::setRecentProduct($product->id);

        $otherProduct = Product::where('id', '<>', $product->id)
            ->status(BaseModel::STATUS_ACTIVE)
            ->categoryId($product->category_id)
            ->limit(10)
            ->orderBy('id', 'desc')
            ->get();

        $sameBrand = Product::where('id', '<>', $product->id)
            ->status(BaseModel::STATUS_ACTIVE)
            ->brandId($product->brand_id)
            ->limit(10)
            ->orderBy('id', 'desc')
            ->get();


        $sameSurface = Product::where('id', '<>', $product->id)
            ->status(BaseModel::STATUS_ACTIVE)
            ->surfaceId($product->surface_id)
            ->limit(10)
            ->orderBy('id', 'desc')
            ->get();

        return view('web.product.detail', compact('product', 'otherProduct', 'sameBrand', 'sameSurface'));
    }


    /**
     * Add product to cart
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function addToCart(Request $request)
    {
        $this->validate($request, []);

        $product = Product::where('id', $request->product_id)->first();

        if (empty($product)) {
            return response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại hoặc đã bị xóa. Vui lòng ']);
        }

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->quantity,
            'price' => $product->getPrice(),
        ])->associate('App\Models\Product');

        return response()->json([
            'success' => true, 'message' => 'Thêm sản phẩm vào giỏ hàng thành công',
            'number_product' => Cart::count()
        ]);
    }


    /**
     * Filter product
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $listProduct = Product::where('name', 'like', '%'.$request->get('q').'%')->orderBy('id', 'desc')
            ->where('status', BaseModel::STATUS_ACTIVE)->paginate(12);


        $newestProduct = Product::orderBy('id', 'desc')
            ->where('status', BaseModel::STATUS_ACTIVE)->limit(3)->get();

        return view('web.product.index', compact('listProduct', 'newestProduct'));
    }


    public function comment(Request $request)
    {
        $this->validate($request, [
            'product_id' => ['required', 'exists:products,id'],
            'name' => ['required', 'max:255'],
            'comment' => ['required', 'max:500']
        ]);

        $comment = ProductComment::create([
            'product_id' => $request->product_id,
            'parent_id' => 0,
            'name' => $request->name,
            'comment' => $request->comment,
            'status' => BaseModel::STATUS_INACTIVE
        ]);

        if(empty($comment)){
            return response()->json(['success' => false, 'message' => 'Có lỗi trong quá trình gửi bình luận. Mời bạn thử lại sau']);
        }

        return response()->json(['success' => true, 'message' => 'Gửi bình luận thành công. Bình luận của bạn sẽ được kiểm duyệt bởi quản trị viên. Xin cảm ơn.']);
    }


    public function review(Request $request)
    {
        $this->validate($request, [
            'product_id' => ['required', 'exists:products,id'],
            'point' => ['required', 'integer', 'min:1', 'max:5'],
            'name' => ['required', 'max:255'],
            'comment' => ['required', 'max:500']
        ]);

        $review = ProductReview::create([
            'product_id' => $request->product_id,
            'point' => $request->point,
            'name' => $request->name,
            'comment' => $request->comment,
            'status' => BaseModel::STATUS_INACTIVE
        ]);

        if(empty($review)){
            return response()->json(['success' => false, 'message' => 'Có lỗi trong quá trình gửi đánh giá. Mời bạn thử lại sau']);
        }

        return response()->json(['success' => true, 'message' => 'Gửi đánh giá thành công. Đánh giá của bạn sẽ được kiểm duyệt bởi quản trị viên. Xin cảm ơn.']);

    }
}
