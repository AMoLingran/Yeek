<?php

namespace app\common\controller;

use app\common\controller\Index as commonIndex;

class Index
{
    public function index()
    {
        return "this is common";
    }

    public function common()
    {
        $common = new commonIndex();
        return $common->index();
//            return "common";
    }
}