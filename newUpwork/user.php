<?php
if (!isset($_SESSION)) {
    session_start();
}
$rootDir = dirname(__FILE__) . "/";

//参见：https://www.php.net/manual/zh/function.spl-autoload-register.php
function my_autoloader($class)
{
    include 'class/' . $class . '.class.php';
}

spl_autoload_register('my_autoloader');

if(isset($_POST['logout'])){
    unset($_SESSION['username']);
    header("location:index.php");
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>用户管理</title>

    <link rel="icon" href="logo.png" sizes="32x32">
    <script src="bootstrap/js/jquery.min.js"></script>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.js"></script>

</head>
<body>
<?php include_once $rootDir."part/nav.php"?>

<div class="container text-center" style="margin-top: 15%;margin-bottom: 15%">
    <form method="post" >
    <input type="submit" name="logout" class="btn btn-danger" value="登出当前账号">
    </form>
</div>

<?php include_once $rootDir."part/footer.php"?>


<script>


</script>

</body>
</html>
