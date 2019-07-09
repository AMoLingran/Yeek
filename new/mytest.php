<?php
//date_default_timezone_set('Asia/Shanghai');
include_once "myHead.php";
$rootDir = dirname(__FILE__) . "/";

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>测试页面</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="logo.png" sizes="32x32">

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

                <!-- Show Table-->
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <div class="card card-small ">
                            <div class="card-header border-bottom mb-2 d-flex justify-content-between ">
                                <div class="text-muted ml-0">#122</div>
                                <div class="">SQL Server</div>

                            </div>
                            <div class="card-body border-bottom ">
                                <h5>按“第9章上机实验三”的要求编写实验报告</h5>
                                <p><a href="#">sql-第9章上机实验三.doc</a></p>

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
                                        <button type="button" class="btn btn-white">
                                            <span class="text">
                                                <i class="material-icons text-primary">vertical_align_top</i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted d-flex justify-content-between ">
                                <div>Start: 4-18</div>
                                <div>End: 4-22</div>

                            </div>
                        </div>

                    </div>
                    <!--End Show Table-->


                </div>

            </div>
            <!-- Footer -->
            <?php include_once $rootDir . "part/footer.php" ?>
            <!-- End Footer -->
        </main>
    </div>
</div>


<script>
    $("#nav_lift li a").eq(5).addClass("active");
    /*

        let uploadId;
        let downloadId;


        $(document).ready(function () {
            $("#nav_lift li a").eq(4).addClass("active");

            $.post("viewModel/workModel.php",
                {
                    flag: "subject",
                },
                function (data) {
                    let subject = jQuery.parseJSON(data);
                    new Vue({
                        el: '#control',
                        data: {
                            subject
                        }
                    });
                    let subjectOption = "<option value=''>未选择</option>";
                    for (let i = 0; i < subject.length; i++) {
                        subjectOption += "<option " +
                            "id='subject_" + subject[i].id + "'" +
                            " value='" + subject[i].id + "'" +
                            ">" +
                            subject[i].name
                            + "</option>"
                    }
                    $("#updateSubject").html(subjectOption)

                }
            );
            getWork();


            $('#file').fileinput({
                theme: 'fas',
                language: 'zh',
                uploadUrl: 'file/receive.php',
                uploadAsync: true, //默认异步上传
                // showUpload: false, //是否显示上传按钮
                // showRemove: false, //显示移除按钮
                allowedFileExtensions: ['txt', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx', 'zip', 'jpg'],
                showPreview: false, //是否显示预览
                showCaption: true,//是否显示标题
                enctype: 'multipart/form-data',
                browseClass: "btn btn-primary", //按钮样式
            }).on("filepreajax", function () {
                $("#uploadModalStatus").text("文件上传中。。。");
            }).on("fileuploaded", function (event, data, previewId, index) {
                alert(data.response.request);
                $("#uploadModalStatus").text(data.response.request);
            });

        });

        function getWork(id, name, subject, start, end, annex, remarks) {
            $.post("viewModel/workModel.php",
                {
                    flag: "query",
                    id: id,
                    name: name,
                    subject: subject,
                    upload: "true",
                    start: start,
                    end: end,
                    annex: annex,
                    remarks: remarks,
                },
                function (data) {
                    let workTable = "";
                    let work = jQuery.parseJSON(data);

                    if (data === "[]") {
                        alertManage("warning", "没有找到结果");
                    } else {
                        for (let i = 0; i < work.length; i++) {
                            let id = work[i].id;
                            let name = work[i].name;
                            let subject = work[i].subject;
                            let start = work[i].start;
                            let end = work[i].end;
                            let annex = work[i].annex;
                            let remarks = work[i].remarks;
                            let need_upload = work[i].need_upload;
                            if (need_upload === '1') {
                                need_upload = "未上传"
                            } else {
                                need_upload = ""
                            }
                            if (!start) {
                                start = "";
                            } else {
                                start = start.slice(5, 10);
                            }
                            if (!end) {
                                end = "";
                            } else {
                                end = end.slice(5, 10);
                            }
                            if (!annex) {
                                end = "";
                            }
                            if (!remarks) {
                                end = "";
                            }
                            workTable += "<tr>" +
                                "<td>" + id + "</td>" +
                                "<td>" + name + "</td>" +
                                "<td>" + subject + "</td>" +
                                "<td>" + start + "</td>" +
                                "<td>" + end + "</td>" +
                                "<td>" + annex + "</td>" +
                                "<td>" + remarks + "</td>" +
                                "<td>" + need_upload + "</td>" +
                                "<td><a href='#' data-toggle='modal' data-target='#uploadModal' onclick='upload(" + id + ")'>上传</a>" +
                                "/" +
                                "<a href='#' data-toggle='modal' data-target='#delModal' onclick='download(" + id + ")'>下载</a></td><tr>";
                        }

                    }
                    $("#tbody").html(workTable);
                }
            )
        }

        function upload(id) {
            uploadId = id;

            $.post("viewModel/workModel.php",
                {
                    flag: "query",
                    id: id,
                },
                function (data) {
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

        function download() {
            downloadId = id;
            alert("施工中。。。");
        }
    */


</script>


</body>
</html>
