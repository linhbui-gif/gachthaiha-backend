<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Libs\WebLib;
use App\Mail\OrderEmail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Setting;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    /**
     * All news
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('web.cart.index');
    }


    public function update($id, $quantity)
    {
        Cart::update($id, $quantity);
        $html = view('web.cart.cart-item');
        return response()->json([
            'success' => true,
            'message' => 'Cập nhật giỏ hàng thành công',
            'html' => $html->render()
        ]);
    }


    public function destroy($id)
    {
        try {
            Cart::remove($id);
        } catch (\Exception $ex) {

        }

        return redirect()->route('web.cart.index');
    }

    public function emptyCart()
    {
        Cart::destroy();
        return redirect()->route('web.cart.index');
    }


    public function checkout()
    {
        return view('web.cart.checkout');
    }

    /**
     * Function checkout
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function postCheckout(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'max:255'],
            'phone' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
            'note' => ['nullable', 'max:500']
        ], [], [
            'name' => 'Họ và tên',
            'phone' => 'Số điện thoại',
            'address' => 'Địa chỉ giao hàng',
            'note' => 'Ghi chú'
        ]);

        DB::beginTransaction();

        try {
            $insertOrder = [
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'note' => $request->note,
                'total_amount' => str_replace([','], '', Cart::total())
            ];
            $orderId = Order::insertGetId($insertOrder);

            $insertOrderDetail = [];

            if (!Cart::content()->isEmpty()) {
                foreach (Cart::content() as $key => $value) {
                    $insertOrderDetail[] = [
                        'order_id' => $orderId,
                        'product_id' => $value->id,
                        'price' => str_replace([',', '.'], '', $value->price),
                        'quantity' => $value->qty,
                        'option' => !empty($value->options) ? json_encode($value->options) : json_encode([])
                    ];
                }
                OrderDetail::insert($insertOrderDetail);
            }

            // send email
            $adminEmail = WebLib::getSetting(Setting::ADMIN_EMAIL);
            if (!empty($adminEmail)) {
                Mail::to($adminEmail)->send(new OrderEmail($insertOrder));
            }

            Cart::destroy();

            DB::commit();

            return response()->json(['success' => true, 'message' => 'Đặt hàng thành công. Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất. Xin cảm ơn.']);

        } catch (\Exception $ex) {

            Log::error('checkout error. Exception: ' . $ex->getMessage());

            return response()->json(['success' => false, 'message' => 'Đặt hàng không thành công. Mời bạn thử lại.']);
        }
    }


    public function checkoutSuccess()
    {
        return view('web.cart.checkout_success');
    }
}