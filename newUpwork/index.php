<?php
$rootDir = dirname(__FILE__)."/";

//参见：https://www.php.net/manual/zh/function.spl-autoload-register.php
function my_autoloader($class) {
    include 'class/' . $class . '.class.php';
}
spl_autoload_register('my_autoloader');

$db = new DBUtils("mysql", "localhost", "yeek", "utf8", "moreant", "moreant");

$workInfo = new WorkInfo($db);

$workArray = $workInfo->getNeedUploadWork();

?>




<!doctype html>
<html lang="en">
<head>
    <title>作业上传</title>
    <meta charset="UTF-8">
    <link rel="icon" href="/logo.png" sizes="32x32">
    <link href="../navAndFooter.css" type="text/css" rel="stylesheet"/>
    <link href="default.css" type="text/css" rel="stylesheet"/>
</head>
<style>

</style>
<body>
<?php include_once $rootDir."part/nav.php"; ?>

<header>
    <div>

    </div>
</header>


<?php foreach ($workArray as $item):?>
    <?php echo $item['NAME']." - ".$item['name']."<br>"; ?>
<?php endforeach;?>



<?php require_once $rootDir."part/footer.php"; ?>
</body>
</html>
