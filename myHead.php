<?php
$rootDir = dirname(__FILE__) . "/";
//参见：https://www.php.net/manual/zh/function.spl-autoload-register.php
function my_autoloader($class)
{
    include 'class/' . $class . '.class.php';
}

function test()
{
    $pdo = new PDO('', '', '');
    $pdo->query("");
}

spl_autoload_register('my_autoloader');

if (!isset($_SESSION)) {
    session_start();
}
