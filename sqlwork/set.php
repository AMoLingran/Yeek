<?php
/**
 * Created by PhpStorm.
 * User: MoLingran
 * Date: 3/18 0018
 * Time: 21:16
 */

if (!session_id()) {
    session_start();
    if (!isset($_SESSION['login'])) {
        function toLogin()
        {
            $fromFile = substr($_SERVER['PHP_SELF'], strpos($_SERVER['PHP_SELF'], '/', 1) + 1);
            $head = "";
            for ($int = substr_count($fromFile, '/'); $int > 0; $int--) {
                $head = $head . '../';
            }
            var_dump($head);
            header("location:" . $head . "login.php?hint=unLogged&fromFile=$fromFile");
        }
        toLogin();
    }
}
$set = "file/";
$in = '';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文件下载</title>
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