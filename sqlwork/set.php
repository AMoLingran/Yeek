<?php
/**
 * Created by PhpStorm.
 * User: MoLingran
 * Date: 3/18 0018
 * Time: 21:16
 */
var_dump($_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
$set = "file/";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文件下载</title>
    <style>
        fieldset {
            padding: 5% 0;
            text-align: center;
            margin: 5% 15%;
        }
    </style>
    <link rel="icon" href="/logo.png" sizes="32x32">
    <link href="/navAndFooter.css" type="text/css" rel="stylesheet"/>
    <link href="default.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<?php include("../part/nav.php") ?>
    <?php include("function/delete.php") ?>
    <?php include("file/index.php") ?>
    <?php include("function/restore.php") ?>
<?php include("../part/sqlfooter.php") ?>
</body>
</html>