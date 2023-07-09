<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;

class OrderController extends ResourceController
{
    protected $model = Order::class;
    protected $viewPath = 'order';
    protected $name = 'Đơn hàng';
    protected $route = 'order';
}
