<?php

include_once "myHead.php";
$rootDir = dirname(__FILE__) . "/";


?>
<!doctype html>
<html class="no-js h-100" lang="en">
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
            <!-- <div id="alert_box" class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
                 <i class="fa fa-check mx-2"></i>
                 <strong>查询成功</strong>
             </div>-->
            <!-- End Alert-->

            <div class="main-content-container container-fluid px-4">


                <!-- Page Header -->
                <div class="page-header row no-gutters py-4">
                    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                        <span class="text-uppercase page-subtitle">Yeek</span>
                        <h3 class="page-title">测试页面</h3>
                    </div>
                </div>
                <!-- End Page Header -->

                <!-- Work Table -->
                <div class="row">
                    <div class="col">
                        <!--Control-->
                        <div id="control" class="card card-small mb-4">
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
                                        <form id="query">
                                            <div class="form-row">
                                                <div class="form-group col-lg-1 col-4">
                                                    <label for="queryId">id</label>
                                                    <input type="number" class="form-control" id="queryId"
                                                           placeholder="">

                                                </div>
                                                <div class="form-group col-lg-2 col-8">
                                                    <label for="queryName">作业名</label>
                                                    <input type="text" class="form-control" id="queryName"
                                                           placeholder="">
                                                </div>

                                                <div class="form-group col-lg-1 col-6">
                                                    <label for="querySubject">科目</label>
                                                    <select id="querySubject" class="form-control">
                                                        <option selected>未选择</option>
                                                        <option v-for="value in subject">{{value.name}}</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-lg-1 col-6">
                                                    <label for="queryUpload">上交</label>
                                                    <select id="queryUpload" class="form-control">
                                                        <option selected>默认</option>
                                                        <option>需要</option>
                                                        <option>不需要</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-lg-2 col-6">
                                                    <label for="queryStart">开始日期</label>
                                                    <input type="date" class="form-control" id="queryStart"
                                                           placeholder="">
                                                </div>
                                                <div class="form-group col-lg-2 col-6">
                                                    <label for="queryEnd">结束日期</label>
                                                    <input type="date" class="form-control" id="queryEnd"
                                                           placeholder="">
                                                </div>
                                                <div class="form-group col-lg-1 col-6">
                                                    <label for="queryAnnex">课件名</label>
                                                    <input type="text" class="form-control" id="queryAnnex"
                                                           placeholder="">
                                                </div>
                                                <div class="form-group col-lg-2 col-6">
                                                    <label for="queryRemarks">备注</label>
                                                    <input type="text" class="form-control" id="queryRemarks"
                                                           placeholder="">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- End Query From -->

                                    <!-- Insert From -->
                                    <div id="insertBox" class="col" style="display: none">
                                        <form id="insert">
                                            <div class="form-row">
                                                <div class="form-group col-lg-2 col-12">
                                                    <label for="insertName">作业名</label>
                                                    <input type="text" class="form-control is-invalid" id="insertName"
                                                           placeholder="">
                                                    <div class="invalid-feedback">This username is taken.</div>

                                                </div>

                                                <div class="form-group col-lg-1 col-6">
                                                    <label for="insertSubject">科目</label>
                                                    <select id="insertSubject" class="form-control">
                                                        <option selected>未选择</option>
                                                        <option v-for="value in subject">{{value.name}}</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-lg-1 col-6">
                                                    <label for="insertUpload">上交</label>
                                                    <select id="insertUpload" class="form-control">
                                                        <option selected>默认</option>
                                                        <option>需要</option>
                                                        <option>不需要</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-lg-2 col-6">
                                                    <label for="insertStart">开始日期</label>
                                                    <input type="date" class="form-control" id="insertStart"
                                                           placeholder="">
                                                </div>
                                                <div class="form-group col-lg-2 col-6">
                                                    <label for="insertEnd">结束日期</label>
                                                    <input type="date" class="form-control" id="insertEnd"
                                                           placeholder="">
                                                </div>
                                                <div class="form-group col-lg-2 col-6">
                                                    <label for="insertAnnex">课件名</label>
                                                    <input type="text" class="form-control" id="insertAnnex"
                                                           placeholder="">
                                                </div>
                                                <div class="form-group col-lg-2 col-6">
                                                    <label for="insertRemarks">备注</label>
                                                    <input type="text" class="form-control" id="insertRemarks"
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
                                <table class="table mb-0" style="min-width:768px">
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


    let nowShow;

    $(document).ready(function () {
        $("#nav_lift li a").eq(2).attr("class", "nav-link active");
        getWork();
        $.post("viewModel/workInfo.php",
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
            }
        )
    });


    function getWork() {
        $.post("viewModel/workInfo.php",
            {
                flag: "query",
            },
            function (data) {
                let workTable;
                let work = jQuery.parseJSON(data);

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
                        "<td><a href='#' onclick='ins(" + id + ")'>修改</a>" +
                        "/" +
                        "<a href='#' onclick='del(" + id + ")'>删除</a></td>" +
                        "<tr>";
                }
                $("#tbody").html(workTable);
            }
        )
    }


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
        if(nowShow==="#insert"){
            alert("你点了insert的提交");
        }else{
            alert("你点了query的提交");
        }
    }

    function reset() {
        $(nowShow)[0].reset();
    }


    function ins(id) {
        alert("你点击的是=插入=按钮，id是" + id);
    }

    function del(id) {
        alert("你点击的是=删除=按钮，id是" + id);
    }
</script>


</body>
</html>