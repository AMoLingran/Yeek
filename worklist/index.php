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
    ['end' => '0411', 'start' => '0408', 'Subject' => 'php', 'info' => '①复写4.8课堂笔记 ②在线练习可以做到四。', 'annex' => '1809.4.8.JPG'],
    ['end' => '长期', 'start' => '-', 'Subject' => '英语', 'info' => 'B级准备课堂表演节目，713下周五（4月12）上台。', 'annex' => ''],
    ['end' => '长期', 'start' => '-', 'Subject' => '思修', 'info' => '4/9 25-28号上台， 4/11 29-32', 'annex' => ''],
    ['end' => '0408', 'start' => '-', 'Subject' => 'SQL server', 'info' => '按“第六章”的要求编写实验报告', 'annex' => '第六章.doc'],
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
    <div><p>Software1809</p>
        <p><span>Work List</span></p>
        <p>update for 4/8</p>
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
            echo "<td>" . $item['start'] . "</td>";
            echo "<td>" . $item['end'] . "</td>";
            echo "<td>" . $item['Subject'] . "</td>";
            echo "<td>" . $item['info'] . "</td>";
            echo "<td><a download='' href=annex/" . $item['annex'] . ">" . $item['annex'] . "</td>";
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
