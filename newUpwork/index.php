<?php
$rootDir = dirname(__FILE__)."/";

//参见：https://www.php.net/manual/zh/function.spl-autoload-register.php
function my_autoloader($class) {
    include 'class/' . $class . '.class.php';
}
spl_autoload_register('my_autoloader');


$db = new DBUtils();


?>




<!doctype html>
<html lang="en">
<head>
    <title>作业上传</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="logo.png" sizes="32x32">
    <script src="bootstrap/js/jquery.min.js"></script>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.js"></script>
</head>
<style>

</style>
<body>
<?php include_once $rootDir."part/nav.php"; ?>


<?php if(!empty($workArray)):foreach ($workArray as $item):?>
<p align="center">
    <?php echo $item['NAME']." - ".$item['name']."<br>"; ?>
</p>
<?php endforeach;endif;?>

<br>
<div class="text-center mt-5 mb-5">
    <a href="workManage.php" class="btn btn-info btn-lg" role="button">作业管理</a>
</div>
<br>
<p   align="center"><a href="https://gitee.com/Moreant/Yeek/tree/newUpwork/newUpwork">项目地址：</a></p>
<?php require_once $rootDir."part/footer.php"; ?>
</body>
</html>
