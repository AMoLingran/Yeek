<?php

include_once "myHead.php";

$rootDir = dirname(__FILE__) . "/";

$db = new DBUtils();
$work = new Work($db);


$workInfo = $work->needDo(true);


?>
<!doctype html>
<html class="no-js h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>文件管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/favicon.ico" />

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
                            <h3 class="page-title">文件查询</h3>
                        </div>
                    </div>
                    <!-- End Page Header -->


                    <!-- Show Table-->
                    <div class="card card-small">
                        <div class="card-header border-bottom">
                            <h6 class="m-0">上传查询</h6>
                        </div>
                        <div id="table" class="card-body p-0 pb-3 text-center table-responsive-xl ">
                            <table class="table mb-0" style="min-width:1200px">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col" class="border-0">#</th>
                                        <th scope="col" class="border-0">作业</th>
                                        <th scope="col" class="border-0">科目</th>
                                        <th scope="col" class="border-0">开始</th>
                                        <th scope="col" class="border-0">结束</th>
                                        <th scope="col" class="border-0">备注</th>
                                        <th scope="col" class="border-0">操作</th>
                                    </tr>
                                </thead>

                                <tbody id="tbody">
                                    <?php if (isset($workInfo)) : ?>
                                        <?php foreach ($workInfo as $item) : ?>

                                            <tr>
                                                <td><?php echo $item['id'] ?></td>
                                                <td><?php echo $item['name'] ?></td>
                                                <td><?php echo $item['subject'] ?></td>
                                                <td><?php echo  substr($item['start'], 5) ?></td>
                                                <td><?php echo  substr($item['end'], 5) ?></td>
                                                <td style="max-width: 300px"><?php echo $item['remarks'] ?></td>
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#queryModal" onclick="query(<?php echo $item['id'] ?>)">查询</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--End Show Table-->

                    <!-- 查询 模态框 -->
                    <div class="modal fade" id="queryModal">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <!-- 模态框头部 -->
                                <div class="modal-header">
                                    <h4 class="modal-title">当前已上传</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- 模态框主体 -->
                                <div id="queryModalText" class="modal-body">
                                    <p class="h5">正在查询 <span class="text-info">高等数学 - 考完辣</span> 中已上传的作业</p>
                                    <br>
                                    <div id="uploaded"></div>
                                    <br>
                                </div>

                                <!-- 模态框底部 -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" onclick="">关闭
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End 查询 模态框 -->

                </div>
                <!-- Footer -->
                <?php include_once $rootDir . "part/footer.php" ?>
                <!-- End Footer -->
            </main>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            $("#nav_lift li a").eq(3).attr("class", "nav-link active");
        });

        function query(id) {
            var uploadId = id;
            $.post("viewModel/workModel.php", {
                    flag: "query",
                    id: id,
                },
                function(data) {
                    let work = jQuery.parseJSON(data);
                    let name = work[0].name;
                    let subject = work[0].subject;
                    let callname = work[0].call_name;
                    file_dir = "file_" + callname + "_" + id;
                    $('#queryModalText').find("span").text(subject + " - " + name);
                    getFileList(file_dir);
                }
            );
        }


        //获取已上传列表
        function getFileList(file_dir) {
            $.post("file/receive.php", {
                    list: "",
                    dir: file_dir,
                },
                function(data, status) {
                    list = jQuery.parseJSON(data);
                    var myDate = new Date();
                    var mytime = myDate.toLocaleTimeString();
                    $("#uploaded").html("<p class='h5'>刷新时间：<span class='text-info'>" + mytime + "<span></p><br>");
                    $.each(list, function(i, v) {
                        $("#uploaded").html(function(i, o) {
                            return o + "<p>" + v + "</p>"
                        });
                    });
                });
        }
    </script>


</body>

</html>