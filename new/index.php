<?php

include_once "myHead.php";

$rootDir = dirname(__FILE__) . "/";

$db = new DBUtils();
$work = new Work($db);

$workInfo = $work->needDo(false);


?>
<!doctype html>
<html class="no-js h-100" lang="zh">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>作业概览</title>
    <link rel="shortcut icon" href="/favicon.ico" />

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
                        <?php if ($ua == "电脑版") : ?>
                            <?php if (isset($workInfo)) :; ?>
                                <div class="col-lg-4 col-12">
                                    <?php for ($key0 = 0; $key0 < count($workInfo); $key0 += 3) : ?>
                                        <div class="card card-small mb-4">
                                            <div class="card-header text-muted  border-bottom d-flex justify-content-between ">
                                                <div class="ml-0">#<?php echo $workInfo[$key0]['id']; ?></div>
                                                <div class="text-primary"><?php echo $workInfo[$key0]['subject']; ?></div>

                                            </div>
                                            <div class="card-body border-bottom ">
                                                <h5 class="text-dark"><?php echo $workInfo[$key0]['name']; ?></h5>
                                                <?php echo $workInfo[$key0]['remarks']; ?>
                                                <p><a href="#"><?php echo $workInfo[$key0]['annex']; ?></a></p>
                                                <div class="d-flex justify-content-between">

                                                    <div class="btn-group btn-group-sm">

                                                        <?php if ($workInfo[$key0]['need_upload'] == '1') : ?>
                                                            <button type="button" class="btn btn-white"  data-toggle="modal" data-target="#uploadModal" onclick="upload( <?php echo $workInfo[$key0]['id'] ?>)">
                                                                <span class="text">
                                                                    <i class="material-icons text-primary">vertical_align_top</i>
                                                                </span>上交
                                                            </button>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer text-muted d-flex justify-content-between ">
                                                <div>Start: <?php echo substr($workInfo[$key0]['start'], 5); ?></div>
                                                <div>End: <span class="text-success"><?php echo substr($workInfo[$key0]['end'], 5); ?></span>
                                                </div>

                                            </div>
                                        </div>
                                    <?php endfor; ?>
                                </div>

                                <div class="col-lg-4 col-12">
                                    <?php for ($key1 = 1; $key1 < count($workInfo); $key1 += 3) : ?>
                                        <div class="card card-small mb-4">
                                            <div class="card-header text-muted  border-bottom d-flex justify-content-between ">
                                                <div class="ml-0">#<?php echo $workInfo[$key1]['id']; ?></div>
                                                <div class="text-primary"><?php echo $workInfo[$key1]['subject']; ?></div>

                                            </div>
                                            <div class="card-body border-bottom ">
                                                <h5 class="text-dark"><?php echo $workInfo[$key1]['name']; ?></h5>
                                                <?php echo $workInfo[$key1]['remarks']; ?>
                                                <p><a href="#"><?php echo $workInfo[$key1]['annex']; ?></a></p>

                                                <div class="d-flex justify-content-between">

                                                    <div class="btn-group btn-group-sm">
                                                    
                                                            <?php if ($workInfo[$key1]['need_upload'] == '1') : ?>
                                                        <button type="button" class="btn btn-white"  data-toggle="modal" data-target="#uploadModal" onclick="upload( <?php echo $workInfo[$key1]['id'] ?>)">
                                                            <span class="text">
                                                                <i class="material-icons text-primary">vertical_align_top</i>
                                                            </span>上交
                                                        </button>
                                                    <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer text-muted d-flex justify-content-between ">
                                                <div>Start: <?php echo substr($workInfo[$key1]['start'], 5); ?></div>
                                                <div>End: <span class="text-success"><?php echo substr($workInfo[$key1]['end'], 5); ?></span>
                                                </div>

                                            </div>
                                        </div>
                                    <?php endfor; ?>
                                </div>


                                <div class="col-lg-4 col-12">
                                    <?php for ($key2 = 2; $key2 < count($workInfo); $key2 += 3) : ?>
                                        <div class="card card-small mb-4">
                                            <div class="card-header text-muted  border-bottom d-flex justify-content-between ">
                                                <div class="ml-0">#<?php echo $workInfo[$key2]['id']; ?></div>
                                                <div class="text-primary"><?php echo $workInfo[$key2]['subject']; ?></div>

                                            </div>
                                            <div class="card-body border-bottom ">
                                                <h5 class="text-dark"><?php echo $workInfo[$key2]['name']; ?></h5>
                                                <?php echo $workInfo[$key2]['remarks']; ?>
                                                <p><a href="#"><?php echo $workInfo[$key2]['annex']; ?></a></p>

                                                <div class="d-flex justify-content-between">

                                                    <div class="btn-group btn-group-sm">

                                                        <?php if ($workInfo[$key2]['need_upload'] == '1') : ?>
                                                            <button type="button" class="btn btn-white"  data-toggle="modal" data-target="#uploadModal" onclick="upload( <?php echo $workInfo[$key2]['id'] ?>)">
                                                                <span class="text">
                                                                    <i class="material-icons text-primary">vertical_align_top</i>
                                                                </span>上交
                                                            </button>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer text-muted d-flex justify-content-between ">
                                                <div>Start: <?php echo substr($workInfo[$key2]['start'], 5); ?></div>
                                                <div>End: <span class="text-success"><?php echo substr($workInfo[$key2]['end'], 5); ?></span>
                                                </div>

                                            </div>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                            <?php endif; ?>
                        <?php elseif ($ua == "移动版") : ?>
                            <?php if (isset($workInfo)) :; ?>
                                <div class="col-12">
                                    <?php for ($key0 = 0; $key0 < count($workInfo); $key0 += 1) : ?>
                                        <div class="card card-small mb-4">
                                            <div class="card-header text-muted  border-bottom d-flex justify-content-between ">
                                                <div class="ml-0">#<?php echo $workInfo[$key0]['id']; ?></div>
                                                <div class="text-primary"><?php echo $workInfo[$key0]['subject']; ?></div>

                                            </div>
                                            <div class="card-body border-bottom ">
                                                <h5 class="text-dark"><?php echo $workInfo[$key0]['name']; ?></h5>
                                                <?php echo $workInfo[$key0]['remarks']; ?>
                                                <p><a href="#"><?php echo $workInfo[$key0]['annex']; ?></a></p>
                                                <div class="d-flex justify-content-between">

                                                    <div class="btn-group btn-group-sm">

                                                        <?php if ($workInfo[$key0]['need_upload'] == '1') : ?>
                                                            <button type="button" class="btn btn-white"  data-toggle="modal" data-target="#uploadModal" onclick="upload( <?php echo $workInfo[$key0]['id'] ?>)">
                                                                <span class="text">
                                                                    <i class="material-icons text-primary">vertical_align_top</i>
                                                                </span>上交
                                                            </button>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer text-muted d-flex justify-content-between ">
                                                <div>Start: <?php echo substr($workInfo[$key0]['start'], 5); ?></div>
                                                <div>End: <span class="text-success"><?php echo substr($workInfo[$key0]['end'], 5); ?></span>
                                                </div>

                                            </div>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>


                <!-- 上传 模态框 -->
                <div class="modal fade" id="uploadModal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <!-- 模态框头部 -->
                            <div class="modal-header">
                                <h4 class="modal-title">文件上传</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- 模态框主体 -->
                            <div id="uploadModalText" class="modal-body">
                                <p class="h5">请选择 <span class="text-info">高等数学 - 考完辣</span> 的作业</p>
                                <br>
                                <input id="file" name="file" type="file" data-theme="fas">
                                <div id="errorBox"></div>
                                <h4 id="uploadModalStatus"></h4>
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
                <!-- End 上传 模态框 -->




                <!-- Footer -->
                <?php include_once $rootDir . "part/footer.php" ?>
                <!-- End Footer -->
            </main>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $("#nav_lift li a").eq(0).attr("class", "nav-link active");
            $('#file').fileinput({
                theme: 'fas',
                language: 'zh',
                uploadUrl: 'file/receive.php',
                uploadAsync: true, //默认异步上传
                // showUpload: false, //是否显示上传按钮
                // showRemove: false, //显示移除按钮
                allowedFileExtensions: ['txt', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx', 'zip', 'jpg','rar'],
                showPreview: false, //是否显示预览
                showCaption: true, //是否显示标题
                maxFileSize: 5120, // 限制大小
                enctype: 'multipart/form-data',
                browseClass: "btn btn-primary", //按钮样式
                elErrorContainer: "#errorBox"
            }).on("filepreajax", function() {
                $("#uploadModalStatus").text("文件上传中。。。");
            }).on("fileuploaded", function(event, data, previewId, index) {
                alert(data.response.request);
                $("#uploadModalStatus").text(data.response.request);
            });
        });

        function upload(id) {
            uploadId = id;

            $.post("viewModel/workModel.php", {
                    flag: "query",
                    id: id,
                },
                function(data) {
                    let uploadModalText = $('#uploadModalText');

                    let work = jQuery.parseJSON(data);
                    let id = work[0].id;
                    let name = work[0].name;
                    let subject = work[0].subject;
                    let callname = work[0].call_name;
                    file_dir = "file_" + callname + "_" + id;
                    //每次选择都刷新文件上传框
                    uploadModalText.find("span").text(subject + " - " + name);
                    $("#uploadModalStatus").text("");
                    $('#file').fileinput('refresh', {
                        uploadExtraData: {
                            'dir': file_dir,
                            workId: uploadId
                        }
                    }).fileinput('clear');
                }
            );
        }
    </script>


</body>

</html>