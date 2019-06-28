<?php

include_once "myHead.php";

$rootDir = dirname(__FILE__) . "/";

$db = new DBUtils();
$work = new Work($db);

$workInfo = $work->needDo(false);


?>
<!doctype html>
<html class="no-js h-100" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>作业概览</title>
    <link rel="icon" href="logo.png" sizes="32x32">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="styles/icon.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="styles/shards-dashboards.1.1.0.min.css">
    <link rel="stylesheet" href="styles/extras.1.1.0.min.css">
    <link rel="stylesheet" href="styles/fileinput.css">

    <!--    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">-->
    <link href="styles/icon.css" rel="stylesheet">

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
    <script src="scripts/fileinput.js"></script>
    <script src="scripts/zh.js"></script>


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

                <div class="row">
                    <?php if (isset($workInfo)): ;?>
                        <div class="col-lg-4 col-12">
                            <?php for($key0=0;$key0<count($workInfo);$key0+=3):?>
                                <div class="card card-small mb-4">
                                    <div class="card-header text-muted  border-bottom d-flex justify-content-between ">
                                        <div class="ml-0">#<?php echo $workInfo[$key0]['id'];?></div>
                                        <div class="text-primary"><?php echo $workInfo[$key0]['subject'];?></div>

                                    </div>
                                    <div class="card-body border-bottom ">
                                        <h5 class="text-dark"><?php echo $workInfo[$key0]['name'];?></h5>
                                        <?php echo $workInfo[$key0]['remarks'];?>
                                        <p><a href="#"><?php echo $workInfo[$key0]['annex'];?></a></p>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                    <span class="d-flex mb-2">
                                        <i class="material-icons mr-1">flag</i>
                                        <strong class="mr-1">状态:</strong>
                                        <span class="text-danger">未完成</span>
                                    </span>
                                            </div>
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" class="btn btn-white">
                                            <span class="text-success">
                                                 <i class="material-icons">check</i>
                                            </span>
                                                </button>
                                                <button type="button" class="btn btn-white">
                                            <span class="text-danger">
                                                <i class="material-icons">clear</i>
                                            </span>
                                                </button>
                                                <?php if($workInfo[$key0]['need_upload']=='1'): ?>
                                                <button type="button" class="btn btn-white" onclick="upload( <?php echo $workInfo[$key0]['id']?>)">
                                            <span class="text">
                                                <i class="material-icons text-primary">vertical_align_top</i>
                                            </span>上交
                                                </button>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted d-flex justify-content-between ">
                                        <div>Start: <?php echo substr($workInfo[$key0]['start'],5);?></div>
                                        <div>End:  <span class="text-success"><?php echo substr($workInfo[$key0]['end'],5);?></span></div>

                                    </div>
                                </div>
                            <?php endfor;?>
                        </div>

                        <div class="col-lg-4 col-12">
                            <?php for($key1=1;$key1<count($workInfo);$key1+=3):?>
                                <div class="card card-small mb-4">
                                    <div class="card-header text-muted  border-bottom d-flex justify-content-between ">
                                        <div class="ml-0">#<?php echo $workInfo[$key1]['id'];?></div>
                                        <div class="text-primary"><?php echo $workInfo[$key1]['subject'];?></div>

                                    </div>
                                    <div class="card-body border-bottom ">
                                        <h5 class="text-dark"><?php echo $workInfo[$key1]['name'];?></h5>
                                        <?php echo $workInfo[$key1]['remarks'];?>
                                        <p><a href="#"><?php echo $workInfo[$key1]['annex'];?></a></p>

                                        <div class="d-flex justify-content-between">
                                            <div>
                                    <span class="d-flex mb-2">
                                        <i class="material-icons mr-1">flag</i>
                                        <strong class="mr-1">状态:</strong>
                                        <span class="text-danger">未完成</span>
                                    </span>
                                            </div>
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" class="btn btn-white">
                                            <span class="text-success">
                                                 <i class="material-icons">check</i>
                                            </span>
                                                </button>
                                                <button type="button" class="btn btn-white">
                                            <span class="text-danger">
                                                <i class="material-icons">clear</i>
                                            </span>
                                                    <?php if($workInfo[$key1]['need_upload']=='1'): ?>
                                                </button>
                                                <button type="button" class="btn btn-white" onclick="upload( <?php echo $workInfo[$key1]['id']?>)">
                                            <span class="text">
                                                <i class="material-icons text-primary">vertical_align_top</i>
                                            </span>上交
                                                </button>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted d-flex justify-content-between ">
                                        <div>Start: <?php echo substr($workInfo[$key1]['start'],5);?></div>
                                        <div>End:  <span class="text-success"><?php echo substr($workInfo[$key1]['start'],5);?></span></div>

                                    </div>
                                </div>
                            <?php endfor;?>
                        </div>


                        <div class="col-lg-4 col-12">
                            <?php for($key2=2;$key2<count($workInfo);$key2+=3):?>
                                <div class="card card-small mb-4">
                                    <div class="card-header text-muted  border-bottom d-flex justify-content-between ">
                                        <div class="ml-0">#<?php echo $workInfo[$key2]['id'];?></div>
                                        <div class="text-primary"><?php echo $workInfo[$key2]['subject'];?></div>

                                    </div>
                                    <div class="card-body border-bottom ">
                                        <h5 class="text-dark"><?php echo $workInfo[$key2]['name'];?></h5>
                                        <?php echo $workInfo[$key2]['remarks'];?>
                                        <p><a href="#"><?php echo $workInfo[$key2]['annex'];?></a></p>

                                        <div class="d-flex justify-content-between">
                                            <div>
                                    <span class="d-flex mb-2">
                                        <i class="material-icons mr-1">flag</i>
                                        <strong class="mr-1">状态:</strong>
                                        <span class="text-danger">未完成</span>
                                    </span>
                                            </div>
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" class="btn btn-white">
                                            <span class="text-success">
                                                 <i class="material-icons">check</i>
                                            </span>
                                                </button>
                                                <button type="button" class="btn btn-white">
                                            <span class="text-danger">
                                                <i class="material-icons">clear</i>
                                            </span>
                                                </button>
                                                <?php if($workInfo[$key2]['need_upload']=='1'): ?>
                                                    <button type="button" class="btn btn-white" onclick="upload( <?php echo $workInfo[$key2]['id']?>)">
                                            <span class="text">
                                                <i class="material-icons text-primary">vertical_align_top</i>
                                            </span>上交
                                                </button>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-muted d-flex justify-content-between ">
                                        <div>Start: <?php echo substr($workInfo[$key2]['start'],5);?></div>
                                        <div>End: <span class="text-success"><?php echo substr($workInfo[$key2]['start'],5);?></span></div>

                                    </div>
                                </div>
                            <?php endfor;?>
                        </div>
                    <?php endif; ?>
                </div>


            </div>
            <!-- Footer -->
            <?php include_once $rootDir . "part/footer.php" ?>
            <!-- End Footer -->
        </main>
    </div>
</div>


<script>
    $(document).ready(function () {
        $("#nav_lift li a").eq(0).attr("class", "nav-link active");
    });
    function upload(id) {
        alert(id)
    }
</script>


</body>
</html>