<?php
/**
 * Created by PhpStorm.
 * User: MoLingran
 * Date: 3/18 0018
 * Time: 22:30
 */

$navLocal = $_SERVER['SCRIPT_NAME'];
if (PATH_SEPARATOR == ':') {
    //Linux
    $navInfo = [
        'host' => '外网',
        'name' => '一客',
        'domain' => 'yeek.top',
        'toName' => '校园',
        'toHost' => '内网',
        'toDomain' => '10.50.43.44',
    ];
} else {
    //Windows
    $navInfo = [
        'host' => '内网',
        'name' => '校园',
        'domain' => '10.50.43.44',
        'toName' => '一客',
        'toHost' => '外网',
        'toDomain' => 'yeek.top',
    ];
}
?>
<nav>
    <ul>
        <li><a href="http://<?php echo $navInfo['domain'] ?>">一客</a></li>
        <li><a href="http://<?php echo $navInfo['domain'] ?>/worklist">作业清单</a></li>
        <li><a href="http://<?php echo $navInfo['domain'] ?>/sqlwork">SQL Work</a></li>
        <li><a href="http://<?php echo $navInfo['toDomain'] . $navLocal ?>">换至<?php echo $navInfo['toName'] ?></a></li>
    </ul>
</nav>
