<?php

namespace App\Helpers;

class Helper
{
    public static function convert($value, $decimals = 1)
    {
        $units = ['', 'K', 'M', 'B'];

        for ($i = 0; $value >= 1000; $i++) {
            $value /= 1000;
        }

        return round($value, $decimals) . $units[$i];

        /*if ($value >= 1000) {
            $number = $value / 1000;
            $whole = floor($number);      // 1
            $fraction = $number - $whole; // .25

            return $newVal = number_format($number,2) . 'k';
        }
        return $value;*/
    }
}
