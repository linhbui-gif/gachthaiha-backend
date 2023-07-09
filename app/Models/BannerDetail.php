<?php

namespace App\Models;

use App\Http\Requests\Admin\Banner\CreateBannerRequest;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BannerDetail extends BaseModel
{
    use SoftDeletes;


    /**
     * @param CreateBannerRequest $request
     * @param $bannerId
     */
    public static function insertBannerDetail(CreateBannerRequest $request, $bannerId)
    {
        $insertBannerDetail = [];
        if(!empty($request->list_image)){
            foreach($request->list_image as $bannerDetail){
                $insertBannerDetail[] = [
                    'banner_id' => $bannerId,
                    'image' => $bannerDetail['image'],
                    'title' => $bannerDetail['title'],
                    'link' => !empty($bannerDetail['link']) ? $bannerDetail['link'] : '#',
                    'description' => !empty($bannerDetail['description']) ? $bannerDetail['description'] : '',
                ];
            }
            if(!empty($insertBannerDetail)){
                BannerDetail::insert($insertBannerDetail);
            }
        }
    }
}
