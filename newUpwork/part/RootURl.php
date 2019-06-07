<?php
function RootURL()
{
    $head="";
    for ($int = substr_count($_SERVER['PHP_SELF'], '/')-1; $int > 0; $int--) {
        $head = $head . '../';
    }
    return $head;
}
return RootURL();