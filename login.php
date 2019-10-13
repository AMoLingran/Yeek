<?php
/**
 * Created by PhpStorm.
 * User: MoLingran
 * Date: 3/17 0017
 * Time: 16:18
 */

include_once "myHead.php";
$rootDir = dirname(__FILE__) . "/";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="/favicon.ico" />
    <link href="styles/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="styles/icon.css" type="text/css" rel="stylesheet">
    <script src="scripts/jquery.min.js"></script>
    <script src="scripts/bootstrap.min.js"></script>
</head>
<body>
<?php include_once $rootDir . "part/nav.php" ?>

<main class="container" style="margin-top: 3%">
    <form method="post" class="col-md-4 ">
        <p class="display-3 ">登录</p>
        默认的账号和密码是学号
        <br>
        <label for="username"></label>
        <input class="form-control" id="username" name="username" type="text" placeholder="请输入用户名">

        <label for="password"></label>
        <input class="form-control" id="password" name="password" type="password" placeholder="请输入密码">


        <br>
        <p id="result" class="text-danger"></p>
        <button class="btn btn-primary btn-block" id="submit" name="submit" type="button" onclick="login()" >登录</button>
    </form>
</main>

<?php include_once $rootDir . "part/footer.php" ?>
<script>
    function login() {
        $.post("viewModel/accountModel.php",
            {
                login: "",
                username: $("#username").val(),
                password: $("#password").val(),
            },
            function (date) {
                if (date!=='[]'){
                    alert("登录成功");
                    window.location.replace("index.php");
                }else {
                    $("#result").text("登陆失败，请检查账号和密码");
                }
        });
    }
</script>
</body>
</html>
