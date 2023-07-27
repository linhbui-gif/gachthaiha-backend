<?php

namespace App\Libs;

use Illuminate\Support\Facades\Route;

class RouteLib
{
    public static function generateRoute($prefix, $controller, $name)
    {
        Route::prefix($prefix)->group(function () use ($controller, $name) {
            Route::group(['middleware' => ['permission:' . config('permission.list.' . $name . '.list') . ':admin']],
                function () use ($controller, $name) {
                    Route::get('/', $controller . '@index')->name('admin.' . $name . '.index');
                    Route::post('/', $controller . '@search')->name('admin.' . $name . '.search');
                    Route::get('/show/{id}', $controller . '@show')->name('admin.' . $name . '.show');
                });

            Route::group(['middleware' => ['permission:' . config('permission.list.' . $name . '.create') . ':admin']],
                function () use ($controller, $name) {
                    Route::get('/create', $controller . '@create')->name('admin.' . $name . '.create');
                    Route::post('/create', $controller . '@store')->name('admin.' . $name . '.store');
                    Route::post('/copy/{id}', $controller . '@copy')->name('admin.' . $name . '.copy');
                });
            Route::group(['middleware' => ['permission:' . config('permission.list.'.$name.'.update') . ':admin']],
                function () use ($controller, $name) {
                    Route::get('/edit/{id}', $controller . '@edit')->name('admin.' . $name . '.edit');
                    Route::post('/edit/{id}', $controller . '@update')->name('admin.' . $name . '.update');
                    Route::post('/update-status', $controller . '@updateStatus')->name('admin.' . $name . '.update_status');
                });

            Route::group(['middleware' => ['permission:' . config('permission.list.' . $name . '.delete') . ':admin']],
                function () use ($controller, $name) {
                    Route::post('/destroy/{id}', $controller . '@destroy')->name('admin.' . $name . '.destroy');
                    Route::post('/batch-process', $controller . '@batchProcess')->name('admin.' . $name . '.batch_process');
                });
        });
    }
}

?>