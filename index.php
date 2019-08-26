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
<!-- 本页的壁纸基本来自 https://www.vactualpapers.com/  -->

<head>
    <meta charset="UTF-8">
    <title>一客</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="/logo.png" sizes="32x32">
    <link href="styles/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="styles/icon.css" type="text/css" rel="stylesheet">
    <script src="scripts/jquery.min.js"></script>
    <script src="scripts/bootstrap.min.js"></script>
</head>

<body style="background-color: #40565c">
    <a href=""></a>

    <div id="background" style="">
        <!--<video  muted autoplay="autoplay" loop="loop" class="container-fluid " src="mn.mp4" style="position: absolute;z-index: -98;padding: 0">-->
        <!--</video>-->
        <div class="navbar-dark">
            <?php include_once  "part/nav.php" ?>
        </div>
        <main>
            <div class="container text-center">
                <br> <br> <br> <br> <br> <br> <br><br> <br>
                <p class="display-1 font-weight-light text-light">一 客</p>
                <h1 class="mb-5 font-weight-bold">
                    <span class="text-primary"> Y </span>
                    <span class="text-danger"> e </span>
                    <span class="text-warning"> e </span>
                    <span class="text-success"> k </span>
                    <span class="text-light"> . t o p </span>
                </h1>
                <br> <br> <br>
                <div class="col-lg-4 offset-lg-4 col-12">
                    <!--            <button class="btn btn-info btn-block btn-lg " onclick="toZhcp()">综 合 测 评 计 算 器</button>-->
                    <!--            <br> <br>-->
                    <!--            <button class="btn btn-primary btn-block btn-lg " onclick="toNew()">作 业 管 理</button>-->
                    <!--            <br> <br>-->
                    <!--            <button class="btn btn-secondary btn-block btn-lg font-weight-light" onclick="toOld()">缅 怀 曾 经</button>-->
                </div>


            </div>
        </main>

        <div class="text-secondary">
            <?php include_once $rootDir . "part/footer.php" ?>
        </div>
    </div>

    <script>
        function random(lower, upper) {
            return Math.floor(Math.random() * (upper - lower + 1)) + lower;
        }
        $("#background").attr("style", "background: url('background/background (" + random(1, 8) + ").jpg') 50% no-repeat; background-size:cover")

        function toZhcp() {
            window.location.href = "zhcp.php";
        }

        function toNew() {
            window.location.href = "new";
        }

        function toOld() {
            window.location.href = "old1";
        }
    </script>
</body>

</html>