<?php

include_once "myHead.php";
$rootDir = dirname(__FILE__) . "/";


?>
<!doctype html>
<html class="no-js h-100" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>作业查询</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="logo.png" sizes="32x32">

    <link href="styles/icon.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="styles/shards-dashboards.1.1.0.min.css">
    <link rel="stylesheet" href="styles/extras.1.1.0.min.css">

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
    <script src="scripts/vue.min.js"></script>


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

            <!-- Alert -->
            <div id="alertBox">
                <div id="alertWarning" class="alert alert-warning alert-dismissible fade show mb-0" role="alert"
                     style="display: none;">
                    <button type="button" class="close" onclick="alertHide()" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="fa fa-check mx-2"></i>
                    <strong></strong>
                </div>
                <div id="alertSuccess" class="alert alert-success alert-dismissible fade show mb-0" role="alert"
                     style="display: none;">
                    <button type="button" class="close" onclick="alertHide()" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="fa fa-check mx-2"></i>
                    <strong></strong>
                </div>
                <div id="alertDanger" class="alert alert-danger alert-dismissible fade show mb-0" role="alert"
                     style="display: none;">
                    <button type="button" class="close" onclick="alertHide()" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <i class="fa fa-check mx-2"></i>
                    <strong></strong>
                </div>
            </div>
            <!-- End Alert-->
            <div class="main-content-container container-fluid px-4">


                <!-- Page Header -->
                <div class="page-header row no-gutters py-4">
                    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                        <span class="text-uppercase page-subtitle">Yeek</span>
                        <h3 class="page-title">作业查询</h3>
                    </div>
                </div>
                <!-- End Page Header -->

                <!-- Work Table -->
                <!--Control-->
                <div id="control" class="row">
                    <div class="col">
                        <div class="card card-small mb-4">
                            <!-- Select Button -->
                            <div class="card-header d-flex border-bottom">
                                <div class="btn-group btn-group-toggle " data-toggle="buttons">
                                    <label class="btn btn-white active" onclick="query()">
                                        <input type="radio" name="options" id="option1" autocomplete="off" checked>查询
                                    </label>
                                    <label class="btn btn-white" onclick="insert()">
                                        <input type="radio" name="options" id="option2" autocomplete="off">插入</label>
                                </div>
                                <button type="submit" class="btn btn-outline-danger ml-auto" onclick="reset()">重 置
                                </button>
                                <button type="submit" class="btn btn-accent ml-3" onclick="submit()">提 交</button>
                            </div>
                            <!-- End Select Button -->
                            <!-- From -->
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item p-3">
                                    <!-- Query From -->
                                    <div id="queryBox" class="col">
                                        <form method="post" id="query">
                                            <div class="form-row">
                                                <div class="form-group col-lg-1 col-4">
                                                    <label for="queryId">id</label>
                                                    <input type="number" class="form-control" id="queryId"
                                                           name="queryId"
                                                           placeholder="">

                                                </div>
                                                <div class="form-group col-lg-2 col-8">
                                                    <label for="queryName">作业名</label>
                                                    <input type="text" class="form-control" id="queryName"
                                                           name="queryName"
                                                           placeholder="">
                                                </div>

                                                <div class="form-group col-lg-1 col-6">
                                                    <label for="querySubject">科目</label>
                                                    <select id="querySubject" name="querySubject" class="form-control">
                                                        <option value="" selected>未选择</option>
                                                        <option v-for="value in subject" :value='value.id'>
                                                            {{value.name}}
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-lg-1 col-6">
                                                    <label for="queryUpload">上交</label>
                                                    <select id="queryUpload" name="queryUpload" class="form-control">
                                                        <option value="" selected>默认</option>
                                                        <option value="1">需要</option>
                                                        <option value="false">不需要</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-lg-2 col-6">
                                                    <label for="queryStart">开始日期</label>
                                                    <input type="date" class="form-control" id="queryStart"
                                                           name="queryStart"
                                                           placeholder="">
                                                </div>
                                                <div class="form-group col-lg-2 col-6">
                                                    <label for="queryEnd">结束日期</label>
                                                    <input type="date" class="form-control" id="queryEnd"
                                                           name="queryEnd"
                                                           placeholder="">
                                                </div>
                                                <div class="form-group col-lg-1 col-6">
                                                    <label for="queryAnnex">课件名</label>
                                                    <input typez="text" class="form-control" id="queryAnnex"
                                                           name="queryAnnex"
                                                           placeholder="">
                                                </div>
                                                <div class="form-group col-lg-2 col-6">
                                                    <label for="queryRemarks">备注</label>
                                                    <input type="text" class="form-control" id="queryRemarks"
                                                           name="queryRemarks"
                                                           placeholder="">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- End Query From -->

                                    <!-- Insert From -->
                                    <div id="insertBox" class="col" style="display: none">
                                        <form method="post" id="insert">
                                            <div class="form-row">
                                                <div class="form-group col-lg-2 col-12">
                                                    <label for="insertName">作业名</label>
                                                    <input type="text" class="form-control" id="insertName" required
                                                           name="insertName"
                                                           placeholder="">
                                                    <div id="insertErrorName" class="invalid-feedback"></div>
                                                </div>
                                                <div class="form-group col-lg-1 col-6">
                                                    <label for="insertSubject">科目</label>
                                                    <select id="insertSubject" name="insertSubject" required
                                                            class="form-control">
                                                        <option value="" selected>未选择</option>
                                                        <option v-for="value in subject" :value='value.id'>
                                                            {{value.name}}
                                                        </option>
                                                    </select>
                                                    <div id="insertErrorSubject" class="invalid-feedback"></div>
                                                </div>

                                                <div class="form-group col-lg-1 col-6">
                                                    <label for="insertUpload">上交</label>
                                                    <select id="insertUpload" name="insertUpload" class="form-control"
                                                            required>
                                                        <option value="" selected>未选择</option>
                                                        <option value="1">需要</option>
                                                        <option value="0">不需要</option>
                                                    </select>
                                                    <div id="insertErrorUpload" class="invalid-feedback"></div>
                                                </div>

                                                <div class="form-group col-lg-2 col-6">
                                                    <label for="insertStart">开始日期</label>
                                                    <input type="date" class="form-control" id="insertStart" required
                                                           name="insertStart"
                                                           placeholder="">
                                                </div>
                                                <div class="form-group col-lg-2 col-6">
                                                    <label for="insertEnd">结束日期</label>
                                                    <input type="date" class="form-control" id="insertEnd" required
                                                           name="insertEnd"
                                                           placeholder="">

                                                </div>
                                                <div class="form-group col-lg-2 col-6">
                                                    <label for="insertAnnex">课件名</label>
                                                    <input type="text" class="form-control" id="insertAnnex" required
                                                           name="insertAnnex"
                                                           placeholder="">
                                                </div>
                                                <div class="form-group col-lg-2 col-6">
                                                    <label for="insertRemarks">备注</label>
                                                    <input type="text" class="form-control" id="insertRemarks" required
                                                           name="insertRemarks"
                                                           placeholder="">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- End Insert From -->
                                </li>
                            </ul>
                            <!-- End From -->
                        </div>
                        <!-- End Control-->

                        <!-- Show Table-->
                        <div class="card card-small mb-4">
                            <div class="card-header border-bottom">
                                <h6 class="m-0">作业</h6>
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
                                        <th scope="col" class="border-0">课件</th>
                                        <th scope="col" class="border-0">备注</th>
                                        <th scope="col" class="border-0">上交</th>
                                        <th scope="col" class="border-0">操作</th>
                                    </tr>
                                    </thead>

                                    <tbody id="tbody">


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--End Show Table-->
                    </div>
                    <!-- 修改模态框 -->
                    <div class="modal fade" id="updateModal">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <!-- 模态框头部 -->
                                <div class="modal-header">
                                    <h4 class="modal-title">修改信息</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- 模态框主体 -->
                                <div class="modal-body">
                                    <div id="updateBox" class="col">
                                        <form method="post" id="update">
                                            <div class="form-row">
                                                <div class="form-group col-lg-4 col-12">
                                                    <label for="updateName">作业名</label>
                                                    <input type="text" class="form-control" id="updateName" required
                                                           name="updateName"
                                                           placeholder="">
                                                    <div id="updateErrorName" class="invalid-feedback"></div>
                                                </div>
                                                <div class="form-group col-lg-2 col-6">
                                                    <label for="updateSubject">科目</label>
                                                    <select id="updateSubject" name="updateSubject" required
                                                            class="form-control">
                                                        <option value="">未选择</option>

                                                    </select>
                                                    <div id="updateErrorSubject" class="invalid-feedback"></div>
                                                </div>

                                                <div class="form-group col-lg-2 col-6">
                                                    <label for="updateUpload">上交</label>
                                                    <select id="updateUpload" name="updateUpload" class="form-control"
                                                            required>
                                                        <option value="" selected>未选择</option>
                                                        <option value="1">需要</option>
                                                        <option value="0">不需要</option>
                                                    </select>
                                                    <div id="updateErrorUpload" class="invalid-feedback"></div>
                                                </div>

                                                <div class="form-group col-lg-4 col-6">
                                                    <label for="updateStart">开始日期</label>
                                                    <input type="date" class="form-control" id="updateStart" required
                                                           name="updateStart"
                                                           placeholder="">
                                                </div>
                                                <div class="form-group col-lg-4 col-6">
                                                    <label for="updateEnd">结束日期</label>
                                                    <input type="date" class="form-control" id="updateEnd" required
                                                           name="updateEnd"
                                                           placeholder="">

                                                </div>
                                                <div class="form-group col-lg-4 col-6">
                                                    <label for="updateAnnex">课件名</label>
                                                    <input type="text" class="form-control" id="updateAnnex" required
                                                           name="updateAnnex"
                                                           placeholder="">
                                                </div>
                                                <div class="form-group col-lg-4 col-6">
                                                    <label for="updateRemarks">备注</label>
                                                    <input type="text" class="form-control" id="updateRemarks" required
                                                           name="updateRemarks"
                                                           placeholder="">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- 模态框底部 -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal"
                                            onclick="updateSubmit()">修改
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- 删除模态框 -->
                    <div class="modal fade" id="delModal">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <!-- 模态框头部 -->
                                <div class="modal-header">
                                    <h4 class="modal-title">修改信息</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- 模态框主体 -->
                                <div class="modal-body">
                                    真的要删除这一行吗？
                                </div>

                                <!-- 模态框底部 -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal"
                                            onclick="delSubmit()">删除
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- End 删除模态框 -->

                </div>
                <!-- End Work Table -->
            </div>


            <!-- Footer -->
            <?php include_once $rootDir . "part/footer.php" ?>
            <!-- End Footer -->
        </main>

    </div>
</div>


<script>
    let nowShow = "#query";
    let updateId;
    let delId;

    $(document).ready(function () {
        $("#nav_lift li a").eq(2).addClass("active");
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
    });


    function query() {
        $("#insertBox").hide();
        $("#queryBox").fadeIn(150);
        nowShow = "#query";
    }

    function insert() {
        $("#queryBox").hide();
        $("#insertBox").fadeIn(150);
        nowShow = "#insert";
    }


    function submit() {
        if (nowShow === '#insert') {
            let status = true;
            let name = $("#insertName");
            let subject = $("#insertSubject");
            let upload = $("#insertUpload");
            let start = $("#insertStart");
            let end = $("#insertEnd");
            let annex = $("#insertAnnex");
            let remarks = $("#insertRemarks");
            let nameError = $("#insertErrorName");
            let subjectError = $("#insertErrorSubject");
            let uploadError = $("#insertErrorUpload");

            if (!name.val()) {
                name.addClass("is-invalid");
                nameError.html("该项不能为空");
                status = false;
            } else {
                name.removeClass("is-invalid");
                nameError.html("");
            }
            if (!subject.val()) {
                subject.addClass("is-invalid");
                subjectError.html("该项不能未选择");
                status = false;
            } else {
                subject.removeClass("is-invalid");
                subjectError.html("");
            }
            if (!upload.val()) {
                upload.addClass("is-invalid");
                uploadError.html("该项不能未选择");
                status = false;
            } else {
                upload.removeClass("is-invalid");
                uploadError.html("");
            }
            if (status === false) {
                return false;
            }
            $.post("viewModel/workModel.php",
                {
                    flag: "insert",
                    name: name.val(),
                    subject: subject.val(),
                    upload: upload.val(),
                    start: start.val(),
                    end: end.val(),
                    annex: annex.val(),
                    remarks: remarks.val(),
                },
                function (data) {
                    let result = jQuery.parseJSON(data);
                    if (result.code === 1) {
                        alertManage("succ", "插入成功");
                        window.location.reload();
                        getWork();
                    } else {
                        alertManage("danger", "插入失败");
                    }
                }
            )
        }

        if (nowShow === '#query') {
            let id = $("#queryId").val();
            let name = $("#queryName").val();
            let subject = $("#querySubject").val();
            let upload = $("#queryUpload").val();
            let start = $("#queryStart").val();
            let end = $("#queryEnd").val();
            let annex = $("#queryAnnex").val();
            let remarks = $("#queryRemarks").val();
            getWork(id, name, subject, upload, start, end, annex, remarks);
        }
    }

    function getWork(id, name, subject, upload, start, end, annex, remarks) {
        $.post("viewModel/workModel.php",
            {
                flag: "query",
                id: id,
                name: name,
                subject: subject,
                upload: upload,
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
                            need_upload = "需要"
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
                            annex = "";
                        }
                        if (!remarks) {
                            remarks = "";
                        }
                        workTable += "<tr>" +
                            "<td>" + id + "</td>" +
                            "<td>" + name + "</td>" +
                            "<td>" + subject + "</td>" +
                            "<td>" + start + "</td>" +
                            "<td>" + end + "</td>" +
                            "<td>" + annex + "</td>" +
                            "<td style='max-width:300px'>" + remarks + "</td>" +
                            "<td>" + need_upload + "</td>" +
                            "<td><a href='#' data-toggle='modal' data-target='#updateModal' onclick='update(" + id + ")'>修改</a>" +
                            "/" +
                            "<a href='#' data-toggle='modal' data-target='#delModal' onclick='del(" + id + ")'>删除</a></td><tr>";
                    }

                }
                $("#tbody").html(workTable);
            }
        )
    }

    function alertManage(type, text) {
        alertHide();
        let warning = $("#alertWarning");
        let success = $("#alertSuccess");
        let danger = $("#alertDanger");
        switch (type) {
            case "warning":
                warning.children("strong").text(text);
                warning.show().fadeOut(3000);
                break;
            case "succ":
                success.children("strong").text(text);
                success.show();
                success.fadeOut(3000);
                break;
            case "danger":
                danger.children("strong").text(text);
                danger.show().fadeOut(3000);
                break;
            default:
                break;
        }
    }


    function alertHide() {
        $("#alertBox").children("div").fadeOut(1000);
    }

    function reset() {
        $(nowShow)[0].reset();
    }


    function update(id) {
        updateId = id;
        $.post("viewModel/workModel.php",
            {
                flag: "query",
                id: id,
            },
            function (data) {
                let info = jQuery.parseJSON(data);
                let id = info[0].id;
                let name = info[0].name;
                let courseId = info[0].courseId;
                let start = info[0].start;
                let end = info[0].end;
                let annex = info[0].annex;
                let remarks = info[0].remarks;
                let need_upload = info[0].need_upload;

                let subjetc = $("#updateSubject");

                // subjetc.children().prop("selected","true");

                subjetc.children("#subject_"+courseId).prop("selected","true");

                $("#updateName").val(name);
                $("#updateStart").val(start);
                $("#updateEnd").val(end);
                $("#updateAnnex").val(annex);
                $("#updateRemarks").val(remarks);
                $("#updateUpload").val(need_upload);

            }
        );
    }

    function updateSubmit() {
        let status = true;
        let name = $("#updateName");
        let subject = $("#updateSubject");
        let upload = $("#updateUpload");
        let start = $("#updateStart");
        let end = $("#updateEnd");
        let annex = $("#updateAnnex");
        let remarks = $("#updateRemarks");
        let nameError = $("#updateErrorName");
        let subjectError = $("#updateErrorSubject");
        let uploadError = $("#updateErrorUpload");

        if (!name.val()) {
            name.addClass("is-invalid");
            nameError.html("该项不能为空");
            status = false;
        } else {
            name.removeClass("is-invalid");
            nameError.html("");
        }
        if (!subject.val()) {
            subject.addClass("is-invalid");
            subjectError.html("该项不能未选择");
            status = false;
        } else {
            subject.removeClass("is-invalid");
            subjectError.html("");
        }
        if (!upload.val()) {
            upload.addClass("is-invalid");
            uploadError.html("该项不能未选择");
            status = false;
        } else {
            upload.removeClass("is-invalid");
            uploadError.html("");
        }
        if (status === false) {
            return false;
        }
        $.post("viewModel/workModel.php",
            {
                flag: "update",
                id: updateId,
                name: name.val(),
                subject: subject.val(),
                upload: upload.val(),
                start: start.val(),
                end: end.val(),
                annex: annex.val(),
                remarks: remarks.val(),
            },
            function (data) {
                let result = jQuery.parseJSON(data);
                if (result.code === 1) {
                    alertManage("succ", "修改成功");
                    getWork();
                } else {
                    alertManage("danger", "修改失败");
                }
            }
        )
    }

    function del(id) {
        delId = id;

    }

    function delSubmit() {
        $.post("viewModel/workModel.php",
            {
                flag: "del",
                id: delId,
            }
            , function (data) {
                let result = jQuery.parseJSON(data);
                if (result.code === 1) {
                    alertManage("succ", "删除成功");
                    getWork();
                } else {
                    alertManage("danger", "删除失败");
                }
            }
        );
    }

</script>


</body>
</html>