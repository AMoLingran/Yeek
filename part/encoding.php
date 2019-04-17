<?php
var_dump(PHP_OS);
function encoding($str)
{
    if (is_string($str)) {
//        if (PATH_SEPARATOR == ':') {
        if (PHP_OS == 'Linux') {
            return $str;
        } else {
            //PHP_OS在Windows输出WINNT
            return iconv('UTF-8', 'GBK', $str);
        }
    } else {
        return $str;
    }
}