<?php

namespace App\Libs;

use App;
use Illuminate\Support\Str;

class CommonLib
{

    /**
     * Function set location to get language
     */
    public static function setLocale()
    {
        $lang = session('lang');
        if (empty($lang)) {
            $lang = 'vi';
        }
        App::setLocale($lang);
    }


    /**
     * Function get validation error
     * @param $validator
     * @return string
     */
    public static function getValidationError($validator)
    {
        $error = $validator->errors();
        $errorMessage = '';
        if (!empty($error)) {
            foreach ($error->all() as $key => $value) {
                $errorMessage .= $value . '</br>';
            }
        }
        $error = $errorMessage;
        return $error;
    }


    /**
     * substring a long content and add button show more
     * @param $string
     * @param int $length
     * @return string
     */
    public static function subStringAndShowMore($string, $length = 10)
    {
        $subString = Str::words(strip_tags($string), $length);
        if ($subString != strip_tags($string)) {
            $html = '<div class="description_tab">
                <div class="description_tab_content description_tab_show">' . $subString . '...<a class="show_description_tab" data-type="hide">Hiển thị thêm</a></div>
                <div class="description_tab_content description_tab_hide" style="display: none;">' . nl2br(strip_tags($string)) . ' <a class="show_description_tab" data-type="show">Hiển thị bớt</a><div>
            </div>';
        } else {
            $html = strip_tags($string);
        }
        return $html;
    }


    /**
     * convert date from old format to new format
     * @param $date
     * @param $toFormat
     * @return false|string
     */
    public static function convertDate($date, $toFormat)
    {
        $dateArray = explode('/', $date);
        $year = !empty($dateArray[2]) ? $dateArray[2] : 1970;
        $month = !empty($dateArray[1]) ? $dateArray[1] : 01;
        $date = !empty($dateArray[0]) ? $dateArray[0] : 01;
        return date($toFormat, strtotime($year.'-'.$month.'-'.$date));
    }
}

?>