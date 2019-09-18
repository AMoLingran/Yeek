<?php

include_once "myHead.php";

?>
<nav class="navbar navbar-expand-sm navbar-light">
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
                    <a class="nav-link " href="zhcp.php">综合测评计算器</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="work/">临时作业上传 <span class="badge badge-danger">Alpha
                            test</span></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['username'])): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION['username'];?></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href=""><i class="material-icons text-success">person</i>我的</a>
                            <div class="dropdown-divider"></div>
                            <a id="logout" class="dropdown-item" onclick="logout()" href="""><i class="material-icons text-danger">person_add</i>退出</a>
                        </div>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link " href="login.php">登录</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>


<script>
    function logout() {
        $("#logout").load("../function/logout.php");
        alert("退出成功");
        window.location.reload();
    }
</script>