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
    <link rel="icon" href="logo.png" sizes="32x32">

    <script src="bootstrap/js/jquery.min.js"></script>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.js"></script>
    <title>注册</title>
</head>
<body>

<?php include_once $rootDir . "part/nav.php" ?>
<div class="container col-sm-3">
    <p class="h1 text-center mb-sm-4">欢迎注册Yeek通行证</p>
    <form method="post" class="form-group">

        <label for="username"></label>
        <input class="form-control mb-3" type="text" name="username" id="username" placeholder="输入账号" required>
        <label for="password"></label>
        <input class="form-control mb-3" type="password" name="password" id="password" placeholder="输入密码" required>
        <label for="repassword"></label>
        <input class="form-control mb-3" type="password" name="repassword" id="repassword" placeholder="再次输入密码" required>
        <label for="email"></label>
        <input class="form-control mb-3" type="email" name="email" id="email" placeholder="输入邮箱" required>
    </form>
    <button type="submit" class="mt-4 btn btn-primary btn-block" onclick="register()">立即注册</button>
    <div class="mt-4">
        <div class="float-right">
            <a href="login.php">已有账号？</a>
        </div>
    </div>
</div>
<script>
    function register() {
        let username = $("#username").val();
        let password = $("#password").val();
        let repassword = $("#repassword").val();
        let email = $("#email").val();
        if (repassword === password) {
            $.post("function/account.php",
                {
                    type: "reg",
                    username: username,
                    password: password,
                    email: email
                },
                function (data, status) {
                    let backInfo = jQuery.parseJSON(data);
                    let code = backInfo.code;
                    if (code === 1) {
                        alert("注册成功");
                        window.location.href="index.php"
                    }
                    if (code === "23000") {
                        alert("用户名或者邮箱已被注册");
                    }
                });
        } else {
            alert("你输入的密码不一致");
        }
    }
</script>
</body>
</html>
