<?php
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
$navDomain=  getNavDomain();

?>
<nav class="container-fluid justify-content-center navbar-expand-sm bg-light">
<ul  class="navbar-nav p-3 nav-pills nav-justified">
    <li class="nav-item"><a class="nav-link h4" href="http://<?php echo $navDomain['domain'] ?>">一客</a></li>
    <li class="nav-item"><a class="nav-link h4" href="http://<?php echo $navDomain['domain'] ?>/worklist">作业清单</a></li>
    <li class="nav-item"><a class="nav-link h4" href="http://<?php echo $navDomain['domain'] ?>/upwork">作业上传</a></li>
    <li class="nav-item"><a class="nav-link h4 active " href="http://<?php echo $navDomain['domain'] ?>/newUpwork">新作业上传(项目开发)</a></li>
    <li class="nav-item"><a class="nav-link h4" href="http://<?php echo $navDomain['toDomain'] . $navDomain['local'] ?>">换至<?php echo $navDomain['toName'] ?></a></li>
</ul>
</nav>
