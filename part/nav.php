<?php
?>
<nav class="navbar navbar-expand-sm bg-light navbar-light">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="Yeek.png" alt="logo" style="width:75px;">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link " href="new">作业管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="error.php">错误日志</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="zhcp.php">综合测评计算器 <span class="badge badge-danger">Alpha test</span></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">未登录</a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="login.php"><i class="material-icons text-success">person</i>登录</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="register.php"><i class="material-icons text-danger">person_add</i>注册</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
