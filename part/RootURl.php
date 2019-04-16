<?php
function RootURL()
{
    $fromFile = substr($_SERVER['PHP_SELF'], strpos($_SERVER['PHP_SELF'], '/', 1));
    $head = "";
    for ($int = substr_count($fromFile, '/'); $int > 0; $int--) {
        $head = $head . '../';
    }
    return $head;
}
return RootURL();