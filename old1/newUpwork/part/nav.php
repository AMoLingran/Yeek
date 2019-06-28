<?php

if (!isset($_SESSION)) {
    session_start();
}
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $userLink = "user.php";
}else{
    $username = "未登录";
    $userLink = "login.php";
}

/**
 * Created by PhpStorm.
 * User: MoLingran
 * Date: 3/18 0018
 * Time: 22:30
 */
function getNavDomain()
{
    if (PATH_SEPARATOR == ':') {
        //Linux
        $info = [
            'host' => '外网',
            'name' => '一客',
            'toName' => '校园',
            'toHost' => '内网',
            'toDomain' => '10.50.43.44',
        ];
    } else {
        //Windows
        $info = [
            'host' => '内网',
            'name' => '校园',
            'toName' => '一客',
            'toHost' => '外网',
            'toDomain' => 'yeek.top',
        ];
    }
    $info['domain'] = $_SERVER['SERVER_NAME'];
    $info['local'] = $_SERVER['SCRIPT_NAME'];
    return $info;
}

$navDomain = getNavDomain();

?>
<nav class="navbar navbar-expand-md bg-dark navbar-dark " style="margin-bottom: 5%">
    <div class="container">
    <a class=" nav-link navbar-brand " href="http://yeek.top">一客</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ">
            <li class="nav-item">
                <a class="nav-link " href="http://<?php echo $navDomain['domain'] ?>/old1/worklist">作业清单</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="http://<?php echo $navDomain['domain'] ?>/old1/upwork">作业上传</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  active "
                   href="http://<?php echo $navDomain['domain'] ?>/old1/newUpwork">新作业上传(项目开发)</a></li>
            <li class="nav-item">
                <a class="nav-link "
                   href="http://<?php echo $navDomain['toDomain'] . $navDomain['local'] ?>">换至<?php echo $navDomain['toName'] ?></a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link navbar-brand" href="http://<?php echo $navDomain['domain']."/newUpwork/".$userLink ?>"><?php echo $username; ?></a>
            </li>
        </ul>



    </div>
</nav>
