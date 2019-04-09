<?php
/**
 * Created by PhpStorm.
 * User: MoLingran
 * Date: 3/17 0017
 * Time: 16:18
 */

include_once("../part/Domain.php");
$domain = new Domain();
$domainInfo=$domain->getDomain();

$counter = 1;
$list = [
    ['end' => '0411', 'start' => '0408', 'Subject' => 'php', 'info' => '①复写4.8课堂笔记 ②在线练习可以做到四。', 'annex' => '1809.4.8.JPG'],
    ['end' => '长期', 'start' => '-', 'Subject' => '英语', 'info' => 'B级准备课堂表演节目，713下周五（4月12）上台。', 'annex' => ''],
    ['end' => '长期', 'start' => '-', 'Subject' => '思修', 'info' => '4/9 25-28号上台， 4/11 29-32', 'annex' => ''],
    ['end' => '0408', 'start' => '-', 'Subject' => 'SQL Server', 'info' => '按“第六章”的要求编写实验报告', 'annex' => '第六章.doc'],
];
asort($list);
function add($array,$flag){
    foreach ($array as $kye => $item) {
        if (is_numeric($item[$flag])) {
            $data = str_split($item[$flag], 2);
            $array[$kye][$flag] =($data[0]+0)."月".($data[1]+0)."日";
        }
    }
    return $array;
}
$list = add($list,"end");
$list = add($list,"start");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>作业清单</title>
    <link rel="icon" href="/logo.png" sizes="32x32">
    <link href="/navAndFooter.css" type="text/css" rel="stylesheet"/>
    <link href="default.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<?php include("../part/nav.php") ?>
<header>
    <div>
        <p><span>Work List</span></p>
        <p>Update for 4/8</p>
        <p><?php echo $domainInfo['name'] ?>版</p>
    </div>
</header>
<main>
    <table>
        <tr>
            <td>发布</td>
            <td>结束</td>
            <td>科目</td>
            <td>内容</td>
            <td>课件</td>
        </tr>
        <?php foreach ($list as $item) {
            echo "<tr>";
            echo "<td>" . $item['start'] . "</td>";
            echo "<td>" . $item['end'] . "</td>";
            echo "<td>" . $item['Subject'] . "</td>";
            echo "<td>" . $item['info'] . "</td>";
            echo "<td><a download href=annex/" . $item['annex'] . ">" . $item['annex'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <p id="OS">
        <a href="http://gitee.com/Moreant/schoolwork">查看某人答案</a>
        <br> <br>
        -此页的源码-<br><br>
        <a href="http://www.php.cn/blog/detail/11666.html">PhpStudy</a>
        <a href="https://github.com/AMoLingran/Yeek" target="_blank">GitHub</a>
        <a href="https://github.com/AMoLingran/Yeek" target="_blank">Gitee</a>
    </p>
</main>
<?php echo include_once("../part/sqlfooter.php") ?>
</body>
</html>
