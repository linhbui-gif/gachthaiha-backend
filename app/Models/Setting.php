<?php

namespace App\Models;

use Illuminate\Http\Request;

class Setting extends BaseModel
{
    const HEADER_CODE                   = 'header_code';
    const FOOTER_CODE                   = 'footer_code';
    const HOT_LINE_NUMBER               = 'hot_line_number';
    const SUPPORT_NUMBER                = 'support_number';
    const ADDRESS                       = 'address';
    const EMAIL                         = 'email';
    const WEBSITE                       = 'website';
    const MAP_IFRAME                    = 'map_iframe';
    const FOOTER_COPYRIGHT              = 'footer_copyright';
    const HOME_SEO_TITLE                = 'home_seo_title';
    const HOME_SEO_DESCRIPTION          = 'home_seo_description';
    const HOME_SEO_KEYWORD              = 'home_seo_keyword';
    const HOME_SEO_IMAGE                = 'home_seo_image';
    const FANPAGE_URL                   = 'fanpage_url';
    const YOUTUBE_LINK                  = 'youtube_link';
    const INSTAGRAM_URL                 = 'instagram_url';
    const ADMIN_EMAIL                   = 'admin_email';
    const BUSINESS_INDEX                = 'business_index';

    const INPUT_TEXT = 1;
    const INPUT_TEXTAREA = 2;
    const INPUT_IMAGE = 3;
    const INPUT_EDITOR = 4;

    public static $inputType = [
        self::INPUT_TEXT => 'Text',
        self::INPUT_TEXTAREA => 'Text Area',
        self::INPUT_IMAGE => 'Image',
        self::INPUT_EDITOR => 'Editor',
    ];

    public static $listKey = [
        self::HEADER_CODE           => 'Header code',
        self::FOOTER_CODE           => 'Footer code',
        self::HOT_LINE_NUMBER       => 'Số điện thoại hotline',
        self::SUPPORT_NUMBER        => 'Số điện thoại tư vấn, hỗ trợ',
        self::ADDRESS               => 'Địa chỉ',
        self::EMAIL                 => 'Email',
        self::WEBSITE               => 'Website',
        self::MAP_IFRAME            => 'Iframe bản đồ',
        self::FOOTER_COPYRIGHT      => 'Nội dung bản quyền tại footer',
        self::HOME_SEO_TITLE        => 'Tiêu đề SEO trang chủ',
        self::HOME_SEO_DESCRIPTION  => 'Mô tả SEO trang chủ',
        self::HOME_SEO_KEYWORD      => 'Từ khóa SEO trang chủ',
        self::HOME_SEO_IMAGE        => 'Ảnh SEO trang chủ',
        self::FANPAGE_URL           => 'Đường dẫn fanpage',
        self::INSTAGRAM_URL         => 'Link instagram',
        self::YOUTUBE_LINK          => 'Link kênh youtube',
        self::ADMIN_EMAIL           => 'Email admin',
        self::BUSINESS_INDEX        => 'Những con số biết nói'

    ];

    protected $fillable = [
        'setting_key', 'setting_value', 'type'
    ];


    public function scopeSettingKey($query, $key)
    {
        return !empty($key) ? $query->where('setting_key', $key) : $query;
    }

    public static function getList(Request $request)
    {
        $limit = $request->post('limit') ? $request->post('limit') : self::$PER_PAGE;
        return self::settingKey($request->setting_key)
            ->sortOrder($request)
            ->paginate($limit);
    }
}
