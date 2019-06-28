<?php

function getPosition()
{
    if (PATH_SEPARATOR == ':') {
        //Linux
        $info = [
            'host' => '外网',
            'name' => '一客',
            'toName' => '校园',
            'toHost' => '内网',
            'toDomain' => '10.50.43.44',
        ];
    } else {
        //Windows
        $info = [
            'host' => '内网',
            'name' => '校园',
            'toName' => '一客',
            'toHost' => '外网',
            'toDomain' => 'yeek.top',
        ];
    }
    $info['domain'] = $_SERVER['SERVER_NAME'];
    $info['local'] = $_SERVER['SCRIPT_NAME'];
    return $info;
}
return getPosition();
