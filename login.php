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

    <link rel="icon" href="/logo.png" sizes="32x32">
    <link href="styles/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="styles/icon.css" type="text/css" rel="stylesheet">
    <script src="scripts/jquery.min.js"></script>
    <script src="scripts/bootstrap.min.js"></script>
</head>
<body>
<?php include_once $rootDir . "part/nav.php" ?>

<main class="container" style="margin-top: 3%">
    <form class="col-md-4 ">
        <p class="display-3 ">登录</p>

        <label for="username"></label>
        <input class="form-control" id="username" name="username" type="text" placeholder="请输入用户名">


        <label for="password"></label>
        <input class="form-control" id="password" name="password" type="password" placeholder="请输入密码">

        <br>
        <input class="btn btn-primary btn-block" id="submit" name="submit" type="submit" value="登录">
    </form>
</main>

<?php include_once $rootDir . "part/footer.php" ?>
<script>

</script>
</body>
</html>
