<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\News;
use App\Models\Order;
use App\Models\Product;
use App\Notifications\Admin\Order\NewOrderNotification;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $numberProduct = Product::count();
        $numberOrder = Order::count();
        $numberNews = News::count();
        return view('admin.dashboard.index',
            compact('numberProduct', 'numberOrder', 'numberNews')
        );
    }
}
?>
