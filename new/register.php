<?php
/**
 * 待填的坑：
 * 检查用户输入
 */


include_once "myHead.php";

?>
<!doctype html>
<html class="no-js h-100" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>注册</title>
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
    <script src="scripts/vue.min.js"></script>
    <script src="scripts/jquery.cookie.js"></script>


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

                <!-- 模态框 -->
                <div class="modal fade" id="Modal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <!-- 模态框头部 -->
                            <div class="modal-header">
                                <h4 class="modal-title">头部</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- 模态框主体 -->
                            <div class="modal-body">
                                文字
                            </div>

                            <!-- 模态框底部 -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal"
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
                        <h3 class="page-title">注册</h3>
                    </div>
                </div>
                <!-- End Page Header -->


                <div id="control" class="">

                    <div class="col-12 col-md-4  offset-md-4 text-center text-md-left p-0">
                        <form id="registerForm" method="post" class="form-group">
                            <div class="form-group">
                                <label for="username">账号<span class="text-danger"> * </span></label>
                                <input class="form-control" type="text" name="username" id="username"
                                       placeholder="输入账号"
                                       required>
                                <div id="usernameError" class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label for="password">密码<span class="text-danger"> * </span></label>
                                <input class="form-control" type="password" name="password" id="password"
                                       placeholder="输入密码"
                                       required>
                                <div id="passwordError" class="invalid-feedback"></div>
                                <label for="repassword"></label>
                                <input class="form-control" type="password" name="repassword" id="repassword"
                                       placeholder="请再次输入输入密码"
                                       required>
                                <div id="repasswordError" class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label for="email">邮箱</label>
                                <input class="form-control" type="email" name="email" id="email"
                                       placeholder="输入账号"
                                       required>
                                <div id="emailError" class="invalid-feedback"></div>
                            </div>
                        </form>

                        <button type="submit" class="mt-3 btn btn-primary btn-block" onclick="register()">注册登录</button>

                        <div class="mt-4">
                            <div class="float-right">
                                <a href="login.php">已有账号→</a>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- 注册成功模态框 -->
                <div class="modal fade" id="successModal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <!-- 模态框头部 -->
                            <div class="modal-header">
                                <h4 class="modal-title">注册成功</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- 模态框主体 -->
                            <div id="modalText" class="modal-body">
                                注册成功，将在3秒后转跳
                            </div>


                        </div>
                    </div>
                </div>
                <!-- END 注册成功模态框 -->

            </div>

            <!-- Footer -->
            <?php include_once $rootDir . "part/footer.php" ?>
            <!-- End Footer -->
        </main>

    </div>
</div>


<script>
    let status = true;
    //DOM初始化，（有种Android的既视感）
    let username = $("#username");
    let password = $("#password");
    let repassword = $("#repassword");
    let email = $("#email");

    let usernameError = $("#usernameError");
    let passwordError = $("#passwordError");
    let repasswordError = $("#repasswordError");
    let emailError = $("#emailError");

    //开始就载入
    $(document).ready(function () {
        //用户名输入检查 blur 是失去焦点时触发
        username.blur(function () {
            //如果username的值为null或者undefined
            if (!username.val()) {
                //删除绿色边框（如果有的话），增加红色边框
                username.removeClass("is-valid").addClass("is-invalid");
                //显示错误信息
                usernameError.html("该项不能为空");
                //不允许注册
                status = false;
            } else {
                //username的值不为空时post到数据库检查是否重复
                $.post(
                    "viewModel/accountModel.php",
                    {
                        check: "1",
                        columns: "username",
                        values: username.val(),
                    },
                    function (data) {
                        //如果查询返回的是空结果就删除警告
                        if (data === "[]") {
                            username.removeClass("is-invalid").addClass('is-valid');
                            usernameError.html("");
                            status = true;
                        } else {
                            //否则就提示已存在
                            username.removeClass("is-valid").addClass("is-invalid");
                            usernameError.html("账号已存在");
                            status = false;
                        }
                    }
                );
            }
        });
        password.blur(function () {
            if (!password.val()) {
                password.removeClass("is-valid").addClass("is-invalid");
                passwordError.html("该项不能为空");
                status = false;
            } else {
                password.removeClass("is-invalid").addClass('is-valid');
                passwordError.html("");
                status = true;
            }
        });
        repassword.blur(function () {
            if (!repassword.val()) {
                repassword.removeClass("is-valid").addClass("is-invalid");
                repasswordError.html("该项不能为空");
                status = false;
            }else if ((password.val() === repassword.val())) {
                repassword.removeClass("is-invalid").addClass('is-valid');
                repasswordError.html("");
            } else {
                repassword.removeClass("is-valid").addClass("is-invalid");
                repasswordError.html("两次输入的密码不相同");
                status = false;
            }
        });
        email.blur(function () {
                if (!email.val()) {
                    email.removeClass("is-invalid");
                    emailError.html("");
                    status = true;
                } else {
                    var reg = /^[a-z0-9](\w|\.|-)*@([a-z0-9]+-?[a-z0-9]+\.){1,3}[a-z]{2,4}$/i;
                    if (email.val().match(reg) == null) {
                        email.addClass("is-invalid");
                        emailError.html("请输入正确的邮箱地址");
                        status = false;
                    } else {
                        $.post(
                            "viewModel/accountModel.php",
                            {
                                check: "1",
                                columns: "email",
                                values: email.val(),
                            },
                            function (data) {
                                if (data === "[]") {
                                    email.removeClass("is-invalid").addClass('is-valid');
                                    emailError.html("");
                                    status = true;
                                } else {
                                    email.removeClass("is-valid").addClass("is-invalid");
                                    emailError.html("该邮箱已存在");
                                    status = false;
                                }
                            }
                        );
                    }

                }
            }
        );


    });


    function register() {
        if (status) {
            $.post(
                "viewModel/accountModel.php",
                {
                    register: "1",
                    username: username.val(),
                    password: password.val(),
                    email: email.val(),
                },
                function (data) {
                    let result = jQuery.parseJSON(data);
                    //表单验证通过后，且post返回的结果是1之后进行跳转和设置cookie
                    if (result.code === 1) {
                        alert("注册成功,欢迎来到Yeek！");
                        $.cookie('username', username.val(), {expires: 5});
                        window.location.href = "index.php"
                    } else {
                        alert("注册失败：" + result.code);
                    }
                }
            );
        }
    }
</script>


</body>
</html>