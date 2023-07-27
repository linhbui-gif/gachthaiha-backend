<?php
namespace App\Libs;

use App\Models\Seo;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SeoLib
{
    /**
     * Generate home seo
     *
     * @return string
     * @throws \Throwable
     */
    public static function generateHomeSEO()
    {
        $title      = WebLib::getSetting(Setting::HOME_SEO_TITLE);
        $description = WebLib::getSetting(Setting::HOME_SEO_DESCRIPTION);
        $keyword    = WebLib::getSetting(Setting::HOME_SEO_KEYWORD);
        $image      = WebLib::getSetting(Setting::HOME_SEO_IMAGE);
        return view('web.elements.seo', [
            'title' => $title,
            'description' => $description,
            'keyword' => $keyword,
            'image' => $image
        ])->render();
    }


    /**
     * Generate seo by type
     *
     * @param $type
     * @param $id
     * @return string
     * @throws \Throwable
     */
    public static function generateSEO($type, $id)
    {
        $seo = Seo::where('type', $type)->where('object_id', $id)->first();
        $title = !empty($seo->title) ? $seo->title : '';
        $description = !empty($seo->description) ? $seo->description : '';
        $keyword = !empty($seo->keyword) ? $seo->keyword : '';
        $image = !empty($seo->image) ? $seo->image : WebLib::getSetting(Setting::HOME_SEO_IMAGE);

        return view('web.elements.seo', [
            'title' => $title,
            'description' => $description,
            'keyword' => $keyword,
            'image' => $image
        ])->render();
    }

    /**
     * admin box to edit seo
     *
     * @param $type
     * @param $seo
     * @return string
     * @throws \Throwable
     */
    public static function adminSEOBox($type, $seo = null)
    {
        return view('admin.layouts.elements.admin_seo_box', ['type' => $type, 'seo' => $seo])->render();
    }


    /**
     * Save SEO content
     *
     * @param Request $request
     * @param $id
     * @param $type
     */
    public static function SEOSave(Request $request, $id, $type)
    {
        Seo::where('type', $type)->where('object_id', $id)->delete();

        $insert = [
            'type'          => $type,
            'object_id'     => $id,
            'title'         => $request->seo_title,
            'description'   => $request->seo_description,
            'keyword'        => $request->seo_keyword,
            'image'        => $request->image,
        ];
        Seo::insert($insert);
    }
}
?>