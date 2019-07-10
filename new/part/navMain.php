<?php
include_once "myHead.php";
if (isset($_COOKIE['username'])) {
    $navUsername = $_COOKIE['username'];
} else {
    $navUsername = "未登录";
}

?>

<div class="main-navbar sticky-top bg-white">
    <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
        <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
            <div class="input-group input-group-seamless ml-3">

            </div>
        </form>
        <ul  class="navbar-nav border-left flex-row ">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-nowrap px-5" data-toggle="dropdown" href="#"
                   role="button" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle mr-2" src="images/shards-dashboards-logo.svg"
                         alt="User Avatar">
                    <span class="d-none d-md-inline-block"><?php echo $navUsername ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                    <?php if (isset($_COOKIE['username'])): ?>
                        <a class="dropdown-item" href="user-profile-lite.html">
                            <i class="material-icons">&#xE7FD;</i> 个人中心 </a>
                        <a class="dropdown-item" href="components-blog-posts.html">
                            <i class="material-icons">vertical_split</i> 作业情况</a>
                        <a class="dropdown-item" href="add-new-post.html">
                            <i class="material-icons">note_add</i> 文件管理 </a>
                        <div class="dropdown-divider"></div>
                        <a id="logout" class="dropdown-item text-danger" href="" onclick="logout()">
                            <i class="material-icons text-danger">&#xE879;</i> 安全退出 </a>
                    <?php else: ?>
                        <a class="dropdown-item " href="login.php">
                            <i class="material-icons text-success">&#xE7FD;</i> 登录 </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="register.php">
                            <i class="material-icons text-danger">&#xE879;</i> 注册 </a>
                    <?php endif; ?>
                </div>
            </li>
        </ul>



        <nav class="nav">
            <a href="#"
               class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left"
               data-toggle="collapse" data-target=".header-navbar" aria-expanded="false"
               aria-controls="header-navbar">
                <i class="material-icons">&#xE5D2;</i>
            </a>
        </nav>
    </nav>
</div>


<script>
    function logout() {
        //当点击退出按钮时刷新页面
        $("#logout").load("../function/logout.php");
        alert("退出成功");
        window.location.reload();
    }
</script>