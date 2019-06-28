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
<nav>
    <ul>
        <li><a href="http://yeek.top"">一客</a></li>
        <li><a href="http://<?php echo $navDomain['domain'] ?>/old1/worklist">作业清单</a></li>
        <li><a href="http://<?php echo $navDomain['domain'] ?>/old1/upwork">作业上传</a></li>
        <li><a href="http://<?php echo $navDomain['domain'] ?>/old1/newUpwork">新 · 作业上传(php项目开发版)</a></li>
        <li><a href="http://<?php echo $navDomain['toDomain'] . $navDomain['local'] ?>">换至<?php echo $navDomain['toName'] ?></a></li>
    </ul>
</nav>
