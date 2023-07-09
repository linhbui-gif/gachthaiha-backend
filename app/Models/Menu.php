<?php

namespace App\Models;

class Menu extends BaseModel
{
    const TYPE_HOME             = 'home';
    const TYPE_NEWS_CATEGORY    = 'news_category';
    const TYPE_NEWS             = 'news';
    const TYPE_NEWS_TAG         = 'news_tag';
    const TYPE_PRODUCT_CATEGORY = 'product_category';
    const TYPE_PRODUCT          = 'product';
    const DESTINATION           = 'destination';
    const TOUR                  = 'tour';
    const HANDBOOK              = 'handbook';
    const HANDBOOK_DESTINATION  = 'handbook_destination';
    const TYPE_LINK             = 'link';

    const POSITION_TOP          = 'top';
    const POSITION_FOOTER_1     = 'footer_1';
    const POSITION_FOOTER_2     = 'footer_2';
    const POSITION_FOOTER_3     = 'footer_3';
    const POSITION_FOOTER_BOTTOM = 'footer_bottom';

    public static $listType = [
        self::TYPE_LINK => 'Link tùy chỉnh'
    ];

    public static $listPosition = [
        self::POSITION_TOP          => 'Menu Top',
        self::POSITION_FOOTER_1     => 'Menu Footer 1',
        self::POSITION_FOOTER_2     => 'Menu Footer 2',
        self::POSITION_FOOTER_3     => 'Menu Footer 3',
        self::POSITION_FOOTER_BOTTOM  => 'Menu Footer Bottom',
    ];

    protected $fillable = [
        'name', 'position', 'status'
    ];


    public function detail()
    {
        return $this->hasMany(MenuDetail::class, 'menu_id', 'id')
            ->orderBy('parent_id')
            ->orderBy('position');
    }
}
