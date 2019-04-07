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
$counter = 1;
$list = [
    ['end' => '408', 'start' => '404', 'Subject' => 'php', 'info' => '①复写4.4课堂笔记 ②在线练习可以做到四。', 'annex' => '1809.4.4.txt'],
    ['end' => '长期', 'start' => '-', 'Subject' => '英语', 'info' => 'B级准备课堂表演节目，713下下周五（4月12）上台。', 'annex' => ''],
    ['end' => '408', 'start' => '-', 'Subject' => 'SQL server', 'info' => '课本P100页 3.实训过程 写在word文档在本站上交。（4月4日前）', 'annex' => '']
];
asort($list);
foreach ($list as $item) {

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>周末作业 0330</title>
    <link rel="icon" href="/logo.png" sizes="32x32">
    <link href="/navAndFooter.css" type="text/css" rel="stylesheet"/>
    <link href="default.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<?php include("../part/nav.php") ?>
<header>
    <div><p>Software1809</p>
        <p><span>Work List</span></p>
        <p>作业清单</p>
        <p><?php echo $hostname ?>版</p>
    </div>
</header>
<main>
    <table>
        <tr>
            <td>发布时间</td>
            <td>截至时间</td>
            <td>科目</td>
            <td>内容</td>
            <td>相关课件</td>
        </tr>
            <?php foreach ($list as $item) {
                echo "<tr>";
                echo "<td>".$item['start']."</td>";
                echo "<td>".$item['end']."</td>";
                echo "<td>".$item['Subject']."</td>";
                echo "<td>".$item['info']."</td>";
                echo "<td><a download='' href=annex/".$item['annex'].">".$item['annex']."</td>";
                echo "</tr>";
            }
            ?>
    </table>

    <p id="OS">
        <a href="http://gitee.com/Moreant/schoolwork">查看某人答案</a>
        <br> <br>
        此页的源码：
        <a href="http://www.php.cn/blog/detail/11666.html">在PhpStudy中</a>
        <a href="https://github.com/AMoLingran/Yeek" target="_blank">在GitHub中</a>
        <a href="https://github.com/AMoLingran/Yeek" target="_blank">在Gitee中</a>
    </p>
</main>
<?php echo include("../part/sqlfooter.php") ?>
</body>
</html>
