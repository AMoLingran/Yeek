<?php


class Domain
{
function getDomain(){
    if (PATH_SEPARATOR == ':') {
        //Linux
        $navInfo = [
            'host' => '外网',
            'name' => '一客',
            'domain' => 'yeek.top',
            'toHost' => '内网',
            'toDomain' => '10.50.43.44',
        ];
    } else {
        //Windows
        $navInfo = [
            'fuck' => 'fuck?',
            'host' => '内网',
            'name' => '校园',
            'domain' => '10.50.43.44',
            'toHost' => '外网',
            'toDomain' => 'yeek.top',
        ];
    }
    return $navInfo;
}
}