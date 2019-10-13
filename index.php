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
<html class="h-100" lang="zh">
<!-- 本页的壁纸基本来自 https://www.vactualpapers.com/  -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>一客</title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="stylesheet" href="/source/css/bootstrap/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+SC&display=swap" rel="stylesheet">
    <script src="/source/js/jquery.min.js"></script>
    <script src="/source/js/bootstrap/bootstrap.min.js"></script>
    <style>
        body {
            font-family: 'Nunito', 'Noto Sans SC', sans-serif;
        }
    </style>
</head>

<body class="h-100 d-flex flex-column">
    <div class="navbar-light">
        <?php include_once  "part/nav.php" ?>
    </div>
    <main class="flex-grow-1 h-100">
        <div class="container text-center">
            <p class="display-4" style="margin-top: 150px;">一客</p>
            <h2 class="mb-5 font-weight-bold">
                <span class="text-primary">Y</span>
                <span class="text-danger">e</span>
                <span class="text-warning">e</span>
                <span class="text-success">k</span>
                <span class="">.top</span>
            </h2>
            <button class="btn btn-primary btn-lg btn-block col-lg-4 offset-lg-4" onclick="toNew()">作业管理</button>
        </div>
    </main>
    <?php include_once $rootDir . "part/footer.php" ?>

    <script>
        function toNew() {
            window.location.href = "new";
        }
    </script>
</body>

</html>