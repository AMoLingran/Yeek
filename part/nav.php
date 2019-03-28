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
        'name' => '外网',
        'toName' => '内网',
        'domain' => 'yeek.top',
        'toDomain' => '10.50.43.44'
    ];
} else {
    //Windows
    $navInfo = [
        'name' => '内网',
        'toName' => '外网',
        'domain' => '10.50.43.44',
        'toDomain' => 'yeek.top'
    ];
}
?>
<nav>
    <ul>
        <li><a href="http://<?php echo $navInfo['domain'] ?>">一客</a></li>
        <li><a href="http://<?php echo $navInfo['domain'] ?>/weekendwork">作业清单</a></li>
        <li><p>SQL Server</p></li>
        <li><a href="http://<?php echo $navInfo['toDomain'] . $navLocal ?>">换至<?php echo $navInfo['toName'] ?></a></li>
    </ul>
</nav>
