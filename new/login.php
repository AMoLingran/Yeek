<?php
//导入头部
include_once "myHead.php";

//构造对象
$db = new DBUtils();
$account = new Account($db);

//如果收到post
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    $result = $account->login($username, $password);
    if ($result) {
        //如果查询有结果就将用户名设置成cookie
        setcookie('username', $result[0]['username'], time() + 5 * 24 * 3600);
        //输出js语句，目的是点击弹窗后跳转到首页
        echo "<script>alert('登录成功');window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('账号或者密码错误');</script>";
    }
}


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

        <main class="main-content col-lg-10 col-md-9 col-md-12 p-0 offset-lg-2 offset-md-3">

            <!-- Main Navbar -->
            <?php include_once $rootDir . "part/navMain.php" ?>
            <!-- / .main-navbar -->


            <!-- End Alert-->
            <div class="main-content-container container-fluid px-4">

                <!-- 模态框 -->
                <div class="modal fade" id="Modal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <!-- 模态框头部 -->
                            <div class="modal-header">
                                <h4 class="modal-title">头部</h4>
                                <button type="button" class="close" data-dimdiss="modal">&times;</button>
                            </div>

                            <!-- 模态框主体 -->
                            <div class="modal-body">
                                文字
                            </div>

                            <!-- 模态框底部 -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger" data-dimdiss="modal"
                                        onclick="">确定
                                </button>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Page Header -->
                <div class="page-header row no-gutters py-4">
                    <div class="col-12 col-md-4  offset-md-4 text-center text-md-left mb-0">
                        <span class="text-uppercase page-subtitle">Yeek</span>
                        <h3 class="page-title">登录</h3>

                    </div>
                </div>
                <!-- End Page Header -->

                <div id="control" class="">

                    <div class="col-12 col-md-4  offset-md-4 text-center text-md-left p-0">
                        <form id="login_form" method="post" class="form-group">
                            <div class="form-group">
                                <label for="username">账号</label>
                                <input class="form-control" type="text" name="username" id="username"
                                       placeholder="输入账号"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="password">密码</label>
                                <input class="form-control" type="password" name="password" id="password"
                                       placeholder="输入密码"
                                       required>
                            </div>
                        </form>

                        <button type="submit" class="mt-3 btn btn-primary btn-block" onclick="login()">立即登录</button>

                        <div class="mt-4">
                            <div class="float-left">
                                <a href="#">←忘记密码</a>
                            </div>
                            <div class="float-right">
                                <a href="register.php">立即注册→</a>
                            </div>
                        </div>


                    </div>
                </div>


            </div>
            <!-- Footer -->
            <?php include_once $rootDir . "part/footer.php" ?>
            <!-- End Footer -->
        </main>

    </div>
</div>


<script>

    //未来加入表单验证
    function login() {


        //jQuery 的提交表单
        $("#login_form").submit();
        //改用php方法
        /*$.post(
            "viewModel/accountModel.php",
            {
                login: "1",
                username: $("#username").val(),
                password: $("#password").val(),
            },
            function (data) {
                if(data ==="[]"){
                    alert("登录失败");
                }
                let result = jQuery.parseJSON(data);
                if (result.name) {
                    alert("注册成功");
                }
            }
        );*/
    }
</script>


</body>
</html>