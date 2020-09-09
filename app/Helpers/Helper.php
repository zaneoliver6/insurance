<?php

if(!function_exists('convert_str_to_date')) {
    /**
     * Returns a date object from string
     *
     * @param string $strFormat
     * Format of the string being converted
     *
     * @param string $str
     * Date string
     *
     * @return DateTime object
     *
     * */
    function convert_str_to_date($strFormat, $str)
    {
        return \DateTime::createFromFormat($strFormat, $str);
    }

}