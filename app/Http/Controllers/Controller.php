<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Menu;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        $data['menuTop'] = Menu::where('position','top')->where('status',1)->first();
        $data['config'] = Config::where('id',14)->first();
        view()->share('data',$data);
    }
}
