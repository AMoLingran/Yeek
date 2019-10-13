<?php
$rootDir = dirname(__FILE__) . "/";
//参见：https://www.php.net/manual/zh/function.spl-autoload-register.php
function my_autoloader($class)
{
    include 'class/' . $class . '.class.php';
}

if (preg_match("#Android|iP#", $_SERVER['HTTP_USER_AGENT'])) {
    $ua = "移动版";
} else {
    $ua = "电脑版";
}
spl_autoload_register('my_autoloader');

if (!isset($_SESSION)) {
    session_start();
}


?>