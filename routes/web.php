<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Libs\RouteLib;
use Illuminate\Support\Facades\Route;

Route::get('/', 'Web\HomeController@index')->name('Home_index');

Route::post('/subscription', 'Web\HomeController@subscription')->name('web.home.subscription');

Route::get('/search', 'Web\ProductController@search')->name('web.product.search');

Route::match(['post', 'get'], '/contact', 'Web\HomeController@contact')->name('Home_contact');
Route::get('/gioi-thieu', 'Web\HomeController@about')->name('Home_about');

Route::get('/san-pham', 'Web\ProductController@index')->name('web.product.index');
Route::get('/danh-muc/{link}', 'Web\ProductController@category')->name('web.product.category');
Route::post('/san-pham/loc', 'Web\ProductController@filter')->name('web.product.filter');
Route::get('/thuong-hieu/{link}', 'Web\ProductController@brand')->name('web.product.brand');
Route::get('/san-pham/{link}', 'Web\ProductController@detail')->name('web.product.detail');
Route::post('/san-pham/binh-luan', 'Web\ProductController@comment')->name('web.product.comment');
Route::post('/san-pham/danh-gia', 'Web\ProductController@review')->name('web.product.review');

Route::post('/add-to-cart', 'Web\ProductController@addToCart')->name('web.product.add_to_cart');
Route::get('/gio-hang', 'Web\CartController@index')->name('web.cart.index');
Route::get('/xoa-gio-hang/{id}', 'Web\CartController@destroy')->name('web.cart.delete');
Route::get('/gio-hang/update/{id}/{quantity}', 'Web\CartController@update')->name('web.cart.update');
Route::get('/thanh-toan', 'Web\CartController@checkout')->name('web.cart.checkout');
Route::post('/thanh-toan', 'Web\CartController@postCheckout')->name('web.cart.postCheckout');
Route::get('/thanh-toan-thanh-cong', 'Web\CartController@checkoutSuccess')->name('web.cart.checkout_success');

Route::get('/tin-tuc', 'Web\NewsController@index')->name('web.news.index');
Route::get('/danh-muc-tin/{link}', 'Web\NewsController@category')->name('web.news.category');
Route::get('/tin-tuc/{link}.html', 'Web\NewsController@detail')->name('web.news.detail');

Route::get('/page/{link}', 'Web\PageController@detail')->name('web.page.detail');

\Illuminate\Support\Facades\Auth::routes();

Route::prefix('admin')->namespace('Admin')->group(function () {

    Route::prefix('auth')->namespace('Auth')->group(function () {
        // Login & Auth
        Route::get('/login', 'LoginController@showLoginForm')->name('admin.auth.login');
        Route::post('login', 'LoginController@login');
        Route::get('/logout', 'AuthController@logout')->name('admin.auth.logout');
        Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
        Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
        Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('admin.password.reset');
        Route::post('/password/reset', 'ResetPasswordController@reset')->name('admin.password.update');
    });

    Route::middleware('admin')->group(function () {

        Route::get('/', 'DashboardController@index')->name('admin.dashboard.index');

        Route::get('/clear-cache', 'SettingController@clearCache')->name('admin.setting.clear_cache');

        Route::prefix('notifications')->group(function () {
            Route::match(['post', 'get'], '/', 'NotifyController@index')->name('admin.notify.index');
            Route::post('/make-read', 'NotifyController@makeRead')->name('admin.notify.make_read');
            Route::post('/make-all-read', 'NotifyController@makeAllRead')->name('admin.notify.make_all_read');
        });
        RouteLib::generateRoute('order', 'OrderController', 'order');
        Route::prefix('profile')->group(function () {
            Route::get('/', 'ProfileController@index')->name('admin.profile.index');
            Route::post('/update', 'ProfileController@index')->name('admin.profile.update');
            Route::post('/change-password', 'ProfileController@changePassword')->name('admin.profile.change_password');
            Route::post('/update-avatar', 'ProfileController@updateAvatar')->name('admin.profile.update_avatar');
        });

        RouteLib::generateRoute('products', 'ProductController', 'product');
        Route::prefix('profile')->group(function () {
            Route::post('/export-excel', 'ProductController@exportExcel')->name('admin.product.export_excel');
            Route::post('/update-price', 'ProductController@updatePrice')->name('admin.product.update_price');
            Route::get('/excel-update', 'ProductController@excelUpdate')->name('admin.product.excel_update');
            Route::post('/excel-update', 'ProductController@excelUpdatePost')->name('admin.product.excel_update_post');
        });

        RouteLib::generateRoute('product-categories', 'ProductCategoryController', 'product_category');

        RouteLib::generateRoute('settings', 'SettingController', 'setting');

        RouteLib::generateRoute('banners', 'BannerController', 'banner');

        RouteLib::generateRoute('partners', 'PartnerController', 'partner');

        RouteLib::generateRoute('pages', 'PageController', 'page');

        RouteLib::generateRoute('menus', 'MenuController', 'menu');

        RouteLib::generateRoute('customer-reviews', 'CustomerReviewController', 'customer_review');

        RouteLib::generateRoute('contacts', 'ContactController', 'contact');

        RouteLib::generateRoute('administrators', 'AdministratorController', 'administrator');

        RouteLib::generateRoute('roles', 'RoleController', 'role');

        RouteLib::generateRoute('news-categories', 'NewsCategoryController', 'news_category');

        RouteLib::generateRoute('news', 'NewsController', 'news');

        RouteLib::generateRoute('subscriptions', 'SubscriptionController', 'subscription');

        RouteLib::generateRoute('sizes', 'SizeController', 'size');
        RouteLib::generateRoute('product-types', 'ProductTypeController', 'product_type');
        RouteLib::generateRoute('product-surfaces', 'ProductSurfaceController', 'product_surface');
        RouteLib::generateRoute('product-comments', 'ProductCommentController', 'product_comment');
        RouteLib::generateRoute('product-reviews', 'ProductReviewController', 'product_review');
        RouteLib::generateRoute('brands', 'BrandController', 'brand');
    });
});
