<?php

function encoding($str)
{
    if (is_string($str)) {
        if (PATH_SEPARATOR == ':') {
            return $str;
        } else {
            return iconv('UTF-8', 'GBK', $str);
        }
    } else {
        return $str;
    }
}