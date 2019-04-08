<?php
/**
 * Created by PhpStorm.
 * User: MoLingran
 * Date: 3/17 0017
 * Time: 16:18
 */

if (PATH_SEPARATOR == ':') {
    //Linux
    $hostname = '一客';
    $domain = 'yeek.top';
} else {
    //Windows
    $hostname = '校园网';
    $domain = '10.50.43.44';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SQL Server 安装教程与文件下载</title>
    <link rel="icon" href="/logo.png" sizes="32x32">
    <link href="/navAndFooter.css" type="text/css" rel="stylesheet"/>
    <link href="default.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<?php include("../part/nav.php") ?>
<header>
    <div>
        <p><span>SQL Server</span></p>
        <p>Installation tutorial and file download</p>
        <p><?php echo $hostname ?>版</p>
    </div>
</header>
<main>
    <article>
        <p id="1"><span>1.</span>前言</p><br>
        <p>忘掉2005吧，2008精简版的安装很无脑下一步即可。</p><br>
        <p>请先到<a href="#2">下载</a>里下载必须文件，然后对照<a href="#3">教程</a>进行安装。
            如果你用的是校园网请直接去<a href="http://10.50.43.44/SQLServer">内网版</a>进行下载。
            如果遇到问题需要重装请到 控制面板/软件管家 卸载干净后再重新安装。</p><br><br>
        <hr>
        <br>
        <p>已知 SQL Server 2008 的坑:</p><br>
        <ol>
            <li>需要预装<a href="Download/NET_Framework_3.5.zip">NET Framework 3.5</a></li>
            <br>
            <li>SQL ReportServer 可能会与Wampserver产生端口冲突，<a target="_blank" href="Download/端口冲突解决方案.zip">解决办法</a>
                by:林梓航
            </li>
            <br>
            <li>SSMS 2008 的服务器名称填 <span>(local)</span> 即可</li>
            <br>
        </ol>
    </article>
    <article>
        <p id="2"><span>2.</span>下载</p><br>
        <p>如果你使用的是校园网，请联系我启动 WampServer, <a target="_blank" href="http://10.50.43.44/SQLServer/#2">使用校园网内网高速下载</a>。
            <span>地址栏中的地址为ip地址的即为内网</span></p><br>
        <br>
        <p>如果你使用的是外网（yeek.top），请点击下面的文件名下载。</p>
        <br><br>
        <p>SQL Server 2008精简版：</p><br>
        <a href="Download/SQLEXPRWT_x64_CHS.exe">SQLEXPRWT_x64_CHS(size：391MB)</a><span> 无脑安装，强推！</span>
        <br><br><br>
        <hr>
        <br><br>
        <dl>
            <dt>仓库：</dt>
            <br>
            <dd><a target="_blank" href="Download/SQL_Server_Management_Studio_2005_x64.msi">SQL_Server_Management_Studio_2005
                    (size: 40.3MB)</a></dd>
            <br>
            <dd><a target="_blank" href="Download/SQL_Server_Management_Studio_2017.exe">SQL_Server_Management_Studio_2017
                    (size:
                    832.81MB)</a></dd>
            <br>
            <dd><a target="_blank" href="Download/SQL_Server_2008_x64.zip">SQL_Server_2008_x64 (size:
                    4.37GB)</a></dd>
            <br>
            <dd><a target="_blank" href="Download/SQL_Server_2005_x64.zip">SQL_Server_2005_x64 (size:
                    1.85GB)</a></dd>
            <br>
            <dd><a target="_blank" href="Download/SQL_Server_64_替换文件.rar">SQL_Server_64_替换文件 (size:
                    10.21MB)</a></dd>
            <br>
            <dd><a target="_blank"
                   href="Download/SQL_Server_2005_SP4.exe">SQL_Server_2005_SP4
                    (size: 391.69MB) </a></dd>
        </dl>
    </article>
    <article>
        <p id="3"><span>3.</span>教程</p><br>
        <dl>
            <dd><a target="_blank" href="https://jingyan.baidu.com/article/948f592434b407d80ef5f97d.html">
                    如何安装SQL Server 2008数据库（带完整图解）</a> <span>强推</span></dd>
        </dl>
    </article>
    <article>
        <p id="4"><span>4.</span>提问须知</p><br>
        <p><a href="https://github.com/dogfight360/Stop-Ask-Questions-The-Stupid-Ways">提问的正确姿势</a>
        </p><br>
        <p align="center"><img src="images/ask.png" alt="" width=100% height=auto></p>
    </article>


</main>


<?php include("../part/sqlfooter.php") ?>

</body>
</html>
