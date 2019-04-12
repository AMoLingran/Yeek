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
    ['end' => '0415', 'start' => '0413', 'Subject' => 'php', 'info' => '①复写4.8课堂笔记 ②在线练习可以做到四。', 'annex' => '1809.4.11.JPG'],
    ['end' => '长期', 'start' => '-', 'Subject' => '英语', 'info' => 'B级课堂表演节目，714下周二（4/16）上台。', 'annex' => ''],
    ['end' => '0416', 'start' => '-', 'Subject' => '思修', 'info' => '4/16 33-36号上台', 'annex' => ''],
    ['end' => '长期', 'start' => '-', 'Subject' => '思修', 'info' => '第十周 - 微电影制作与展示', 'annex' => ''],
    ['end' => '0417', 'start' => '0413', 'Subject' => 'SQL Server', 'info' => '按“第六章-上机实验二”的要求编写实验报告', 'annex' => '第六章-上机实验二.docx'],
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
        <p>Update for 4/13</p>
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

        <?php foreach ($list as $item) :?>
        <tr>
            <td><?php echo $item['start']?></td>
            <td><?php echo $item['end']?></td>
            <td><?php echo $item['Subject']?></td>
            <td><?php echo $item['info']?></td>
            <td><a download href="annex/<?php echo $item['annex']?>"/><?php echo $item['annex']?></td>
        </tr>
        <?php endforeach;?>

        <?php /*foreach ($list as $item) {
            echo "<tr>";
            echo "<td>" . $item['start'] . "</td>";
            echo "<td>" . $item['end'] . "</td>";
            echo "<td>" . $item['Subject'] . "</td>";
            echo "<td>" . $item['info'] . "</td>";
            echo "<td><a download href=annex/" . $item['annex'] . ">" . $item['annex'] . "</td>";
            echo "</tr>";
        }
        */?>
    </table>

    <p id="OS">
        <a href="http://<?php echo $domainInfo['domain'];?>/worklist/oldAnnex">以往课件</a>
        <a href="http://gitee.com/Moreant/schoolwork">某人答案</a>
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
