<?php
/**
 * Created by PhpStorm.
 * User: MoLingran
 * Date: 3/17 0017
 * Time: 16:18
 */

$domainInfo = include_once("part/Position.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>一客</title>
    <link rel="icon" href="/logo.png" sizes="32x32">
    <link href="navAndFooter.css" type="text/css" rel="stylesheet"/>
    <link href="default.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<?php include_once("part/nav.php") ?>

<header>
    <div>
        <p><span>Yeek Group</span></p>
        <p>Everyone is a geek</p>
        <p style="font-size: 25px"><?php echo $domainInfo['name'] ?>版</p>
    </div>
</header>

<main>
    <ul>作业上交-综合（测试版）：
        <li><a href="upwork">作业上交</a></li>
        <br>
    </ul>
    <ul>SQL Server：
        <li><a href="SQLServer">安装教程和文件下载</a></li>
        <li><a href="study/sqlwork">作业上交(已废弃)</a></li>
        <br>
    </ul>
    <ul>作业清单：
        <li><a href="worklist">作业清单</a></li>
    </ul>
</main>

<?php include_once("part/sqlfooter.php") ?>
</body>
</html>
