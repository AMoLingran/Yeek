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
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title>下载视频</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="/logo.png" sizes="32x32">
    <link href="styles/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="styles/icon.css" type="text/css" rel="stylesheet">
    <script src="scripts/jquery.min.js"></script>
    <script src="scripts/bootstrap.min.js"></script>
</head>
<body>


    <!--<video  muted autoplay="autoplay" loop="loop" class="container-fluid " src="mn.mp4" style="position: absolute;z-index: -98;padding: 0">-->
    <!--</video>-->

        <?php include_once $rootDir . "part/nav.php" ?>

    <main>
        <div class="text-center m-5">
            <p class="display-3">三下乡 - 视频下载</p>
        <a class="mt-5 btn btn-lg btn-primary" download="mp4" href="http://markdown.yeek.top/sxx/viedo/粗剪.zip">点击开始下载</a>
        </div>
    </main>

    <div class="text-secondary">
        <?php include_once $rootDir . "part/footer.php" ?>
    </div>
</body>

</html>
