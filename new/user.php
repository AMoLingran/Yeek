<?php

include_once "myHead.php";

$rootDir = dirname(__FILE__) . "/";


?>

<!doctype html>
<html class="no-js h-100" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>个人中心</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="logo.png" sizes="32x32">

    <link href="styles/icon.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="styles/shards-dashboards.1.1.0.min.css">
    <link rel="stylesheet" href="styles/extras.1.1.0.min.css">

    <!--    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script async defer src="scripts/buttons.js"></script>
    <script src="scripts/jquery.min.js"></script>
    <script src="scripts/popper.min.js"></script>
    <script src="scripts/bootstrap.min.js"></script>
    <script src="scripts/Chart.min.js"></script>
    <script src="scripts/shards.min.js"></script>
    <script src="scripts/jquery.sharrre.min.js"></script>
    <script src="scripts/extras.1.1.0.min.js"></script>
    <script src="scripts/shards-dashboards.1.1.0.min.js"></script>
    <script src="scripts/app/app-blog-overview.1.1.0.js"></script>


</head>
<body class="h-100">

<div class="container-fluid">
    <div class="row">
        <!-- Main Sidebar -->
        <?php include_once $rootDir . "part/navLift.php" ?>
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
            <!-- Main Navbar -->
            <?php include_once $rootDir . "part/navMain.php" ?>
            <!-- / .main-navbar -->
            <div class="main-content-container container-fluid px-4">
                <!-- Page Header -->
                <div class="page-header row no-gutters py-4">
                    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                        <span class="text-uppercase page-subtitle">yeek</span>
                        <h3 class="page-title">作业概览</h3>
                    </div>
                </div>
                <!-- End Page Header -->

                <!-- Small Stats Blocks -->
                <div class="row">
                    <div class="col-lg col-md-6 col-sm-6 mb-4">
                        <div class="stats-small stats-small--1 card card-small">
                            <div class="card-body p-0 d-flex">
                                <div class="d-flex flex-column m-auto">
                                    <div class="stats-small__data text-center">
                                        <span class="stats-small__label text-uppercase">访 问</span>
                                        <h6 class="stats-small__value count my-3">2,390</h6>
                                    </div>
                                </div>
                                <canvas height="120" class="blog-overview-stats-small-1"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg col-md-6 col-sm-6 mb-4">
                        <div class="stats-small stats-small--1 card card-small">
                            <div class="card-body p-0 d-flex">
                                <div class="d-flex flex-column m-auto">
                                    <div class="stats-small__data text-center">
                                        <span class="stats-small__label text-uppercase">作 业</span>
                                        <h6 class="stats-small__value count my-3">182</h6>
                                    </div>

                                </div>
                                <canvas height="120" class="blog-overview-stats-small-2"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg col-md-4 col-sm-6 mb-4">
                        <div class="stats-small stats-small--1 card card-small">
                            <div class="card-body p-0 d-flex">
                                <div class="d-flex flex-column m-auto">
                                    <div class="stats-small__data text-center">
                                        <span class="stats-small__label text-uppercase">文 件</span>
                                        <h6 class="stats-small__value count my-3">8,147</h6>
                                    </div>
                                </div>
                                <canvas height="120" class="blog-overview-stats-small-3"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Small Stats Blocks -->
            </div>
            <!-- Footer -->
            <?php include_once $rootDir . "part/footer.php" ?>
            <!-- End Footer -->
        </main>
    </div>
</div>



<script>
    $(document).ready(function () {
        $("#nav_lift li a").eq(4).attr("class","nav-link active");
    });
</script>


</body>
</html>