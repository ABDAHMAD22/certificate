<?php

namespace App\Classes;

class Helpers
{
    public static function convertToEnglish($string)
    {
        $range = range(0, 9);
        $persianDecimal = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabicDecimal = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];
        $arabic = ['٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $string = str_replace($persianDecimal, $range, $string);
        $string = str_replace($arabicDecimal, $range, $string);
        $string = str_replace($arabic, $range, $string);

        return str_replace($persian, $range, $string);
    }

    public static function check_url($url) {
        $return = $url;
        if ((!(substr($url, 0, 7) == 'http://')) && (!(substr($url, 0, 8) == 'https://'))) {
            $return = 'http://' . $url;
        }
        return $return;
    }

    public static function get_remainder($x, $y) {
        $remainder = $x % $y;
        return ($x - $remainder) / $y;
    }
}
