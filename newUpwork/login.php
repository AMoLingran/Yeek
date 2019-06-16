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
<div class="container col-sm-3">
    <p class="h1 text-center mb-sm-4">登录</p>
    <form method="post" class="form-group">

        <label for="username"></label>
        <input class="form-control mb-3" type="text" name="username" id="username" placeholder="输入账号" required>

        <label for="password"></label>
        <input class="form-control mb-3" type="text" name="password" id="password" placeholder="输入密码" required>

    </form>

    <button type="submit" class="mt-4 btn btn-primary btn-block" onclick="login()">立即登录</button>

    <div class="mt-4">
        <div class="float-left">
            <a href="#">←忘记密码</a>
        </div>
        <div class="float-right">
            <a href="register.php">立即注册→</a>
        </div>
    </div>
</div>


<script>
    function login() {
        let username = $("#username").val();
        let password = $("#password").val();
        $.post("function/account.php",
            {
                type: "login",
                username: username,
                password: password,
            },
            function (data, status) {
                let backInfo = jQuery.parseJSON(data);
                let code = backInfo.code;
                if (code === "1") {
                    alert("登录成功");
                    window.location.href = "index.php"
                }
                if (code === "0") {
                    alert("用户名或密码错误，请重试");
                }
            });
    }
</script>

</body>
</html>
