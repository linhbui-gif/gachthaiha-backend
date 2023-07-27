<?php

namespace App\Libs;

use App\Models\BaseModel;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\CustomerReview;
use App\Models\Menu;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Partner;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSurface;
use App\Models\ProductType;
use App\Models\Setting;
use App\Models\Size;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;

class WebLib
{
    /**
     * Get banner by position
     *
     * @param $position
     * @return mixed
     */
    private static function getBanner($position)
    {
        return Banner::where('position', $position)
            ->where('status', BaseModel::STATUS_ACTIVE)
            ->with('detail')->first();
    }

    /**
     * get main banner
     *
     * @return array
     */
    public static function getMainBanner()
    {
        return self::getBanner(Banner::POSITION_MAIN);
    }

    /**
     * Get partner
     *
     * @return mixed
     */
    public static function getPartner()
    {
        return Cache::remember('home::partner', now()->addMinute(60), function () {
            $request = new Request();
            $request->status = BaseModel::STATUS_ACTIVE;
            return Partner::getList($request);
        });

    }


    /**
     * Get customer review
     *
     * @return mixed
     */
    public static function getCustomerReview()
    {
        return Cache::remember('home::customer_review', now()->addMinute(60), function () {
            $request = new Request();
            $request->status = BaseModel::STATUS_ACTIVE;
            return CustomerReview::getList($request);
        });
    }


    /**
     * Get setting by key
     *
     * @param $key
     * @return mixed
     */
    public static function getSetting($key)
    {
        return Cache::remember('setting::' . $key, now()->addMinute(60), function () use ($key) {
            $setting = Setting::where('setting_key', $key)->first();
            if (empty($setting)) {
                return false;
            }

            return $setting->setting_value;
        });
    }

    /**
     * Get one level menu
     * @param $position
     * @return mixed
     */
    public static function getMenu($position)
    {
        return Cache::remember('menu::' . $position, now()->addMinute(60), function () use ($position) {
            return Menu::where('position', $position)
                ->where('status', BaseModel::STATUS_ACTIVE)
                ->with('detail')->first();
        });
    }

    public static function getMenuRecursive($position)
    {
        return Cache::remember('menu::recursive' . $position, now()->addMinute(60), function () use ($position) {
            $menu = Menu::where('position', $position)
                ->where('status', BaseModel::STATUS_ACTIVE)
                ->with('detail')->first();
            if (empty($menu)) {
                return [];
            }

            $menuDetail = $menu->detail->toArray();
            if (empty($menuDetail)) {
                return [];
            }

            $menuRecursive = [];
            foreach ($menuDetail as $key => $value) {
                if (empty($value['parent_id'])) {
                    $value['child'] = [];
                    $menuRecursive[$value['id']] = $value;
                }
            }
            foreach ($menuDetail as $key => $value) {
                if (!empty($menuRecursive[$value['parent_id']])) {
                    $menuRecursive[$value['parent_id']]['child'][] = $value;
                }
            }

            return $menuRecursive;
        });
    }


    public static function getFooterMenuWidget($position)
    {
        return Cache::remember('footer::menu_widget::' . $position, now()->addMinute(60), function () use ($position) {
            $menu = self::getMenu($position);
            return view('web.elements.footer_menu_widget', [
                'menu' => $menu
            ])->render();
        });
    }


    /**
     * Get category of product
     *
     * @return mixed
     */
    public static function getProductCategory()
    {
        return Cache::remember('get_product_category', now()->addMinute(60), function () {
            return ProductCategory::status(BaseModel::STATUS_ACTIVE)->get();
        });
    }

    public static function getParentProductCategory()
    {
        return Cache::remember('get_parent_product_category', now()->addMinute(60), function () {
            return ProductCategory::where('parent_id', 0)
                ->orWhereNull('parent_id')
                ->orWhere('parent_id', '')
                ->status(BaseModel::STATUS_ACTIVE)
                ->with(['size', 'child'])
                ->get();
        });
    }

    public static function getProductCategoryByParent($parentId)
    {
        return Cache::remember('getProductCategoryByParent::'.$parentId, now()->addMinute(60), function () use ($parentId) {
            return ProductCategory::parentId($parentId)
                ->status(BaseModel::STATUS_ACTIVE)->get();
        });
    }

    public static function getProductCategoryByBrandId($brandId)
    {
        return Cache::remember('getProductCategoryByBrandId::'.$brandId, now()->addMinute(60), function () use ($brandId) {
            return ProductCategory::brandId($brandId)
                ->status(BaseModel::STATUS_ACTIVE)->get();
        });
    }


    /**
     * Get new post
     *
     * @return mixed
     */
    public static function getNewPost()
    {
        return Cache::remember('get_new_post', now()->addMinute(60), function () {
            return News::where('news_category_id', 2)
                ->status(BaseModel::STATUS_ACTIVE)
                ->limit(3)->orderBy('id', 'DESC')->get();
        });
    }

    /**
     * Get news categories
     *
     * @return mixed
     */
    public static function getNewsCategories()
    {
        return Cache::remember('get_news_categories', now()->addMinute(60), function () {
            return NewsCategory::status(BaseModel::STATUS_ACTIVE)->get();
        });
    }

    /**
     * Get size
     *
     * @return mixed
     */
    public static function getSize()
    {
        return Cache::remember('get_product_size', now()->addMinute(60), function () {
            return Size::status(BaseModel::STATUS_ACTIVE)->get();
        });
    }

    /**
     * Get product type
     *
     * @return mixed
     */
    public static function getProductType()
    {
        return Cache::remember('get_product_type', now()->addMinute(60), function () {
            return ProductType::status(BaseModel::STATUS_ACTIVE)->get();
        });
    }


    /**
     * Get product surface
     *
     * @return mixed
     */
    public static function getProductSurface()
    {
        return Cache::remember('get_product_surface', now()->addMinute(60), function () {
            return ProductSurface::status(BaseModel::STATUS_ACTIVE)->get();
        });
    }

    /**
     * Get brand by type
     *
     * @param $type
     * @return mixed
     */
    public static function getBrandByType($type)
    {
        return Cache::remember('get_brand_by_type::' . $type, now()->addMinute(60), function () use ($type) {
            return Brand::where('type', $type)->status(BaseModel::STATUS_ACTIVE)->get();
        });
    }

    /**
     * Get brand by category
     *
     * @param $categoryId
     * @return mixed
     */
    public static function getBrandByCategoryId($categoryId)
    {
        return Cache::remember('get_brand_by_category_id::' . $categoryId, now()->addMinute(60), function () use ($categoryId) {
            return Brand::categoryId($categoryId)->status(BaseModel::STATUS_ACTIVE)->get();
        });
    }

    /**
     * Get all brand
     *
     * @return Collection
     */
    public static function getBrand()
    {
        return Cache::remember('get_brand', now()->addMinute(60), function () {
            return Brand::status(BaseModel::STATUS_ACTIVE)->get();
        });
    }

    /**
     * Get recent product view
     *
     * @param $productId
     */
    public static function setRecentProduct($productId)
    {
        $recentProduct = Cookie::get('recent_product');
        $recentProduct = json_decode($recentProduct, 1);
        $recentProduct[] = $productId;
        setcookie('recent_product', json_encode($recentProduct), time() + 30 * 24 * 60 * 60);
    }

    /**
     * Get list recent product
     *
     * @return mixed
     */
    public static function getRecentProduct()
    {
        $recentProduct = $_COOKIE['recent_product'] ?? '';
        $recentProduct = json_decode($recentProduct, 1);
        if (empty($recentProduct)) {
            return [];
        }

        $listProduct = Product::whereIn('id', $recentProduct)->get();
        return $listProduct;
    }
}
