<?php

$rootDir = dirname(__FILE__) . "/";

//参见：https://www.php.net/manual/zh/function.spl-autoload-register.php
function my_autoloader($class)
{
    include 'class/' . $class . '.class.php';
}

spl_autoload_register('my_autoloader');


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="bootstrap/js/jquery.min.js"></script>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.js"></script>
    <title>登录</title>
</head>
<body>

<?php include_once $rootDir . "part/nav.php" ?>

<div class="container mt-5 w-25">
    <div class="card">
        <div class="card-header text-center h3">
            登录
        </div>
        <div class="card-body">
            <form class="form-group">
                <label  for="username">账号</label>
                <input class="form-control mb-3" type="text" name="username" id="username">


                <label  for="password">密码</label>
                <input class="form-control mb-3" type="text" name="password" id="password">

                <input class="btn btn-primary" type="submit" name="submit" id="submit" value="登录">

            </form>
        </div>
    </div>
</div>


</body>
</html>
