<?php

namespace App\Helpers;

class Formatter
{
    /**
     * Clear unexpected characters from phone number and format it.
     * Clean phone number format: 998001112233
     *
     * @param string $phone_number
     * @return array|string
     */
    public static function asPhone(string $phone_number = ""): array|string
    {
        return str_replace([" ", "+", "(", ")", "-", "_","/","\\"], "", $phone_number);
    }


    /**
     * Format first/last/middle/full names.
     * Fit length and remove special characters from string.
     *
     * @param string|null $name
     * @param int $length
     * @return string
     */
    public static function asName(string|null $name = "", int $length = 63): string
    {
        return mb_substr($name, 0, $length);
    }


    /**
     * Format number for readable money currency
     *
     * @param $number
     *
     * @return string
     */
    public static function asMoney($number): string
    {
        return number_format($number, 2, '.', ' ');
    }

    public static function asInteger($number): int
    {
        return intval(preg_replace('/[^0-9]/', '', $number));
    }
}
