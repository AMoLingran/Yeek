<?php
/**
 * Created by PhpStorm.
 * User: MoLingran
 * Date: 3/17 0017
 * Time: 16:18
 */

$domainInfo= include_once("../part/Position.php");
$counter = 1;
$list = [
//    ['end' => '0422', 'start' => '0418', 'Subject' => 'php', 'info' => '编写发送电子邮件实验报告，并导出phpMyAdmin的test表', 'annex' => 'php-发送电子邮件实验报告.doc'],
    ['end' => '0430', 'start' => '-', 'Subject' => '英语', 'info' => 'B级课堂表演节目，716下周二（4/30）上台。', 'annex' => ''],
    ['end' => '0507', 'start' => '-', 'Subject' => '思修', 'info' => '5月27日 45-48号上台', 'annex' => ''],
    ['end' => '0430', 'start' => '0423', 'Subject' => '数学', 'info' => '课本P95 3(1)(4)、P107 1(2)(4)', 'annex' => ''],
    ['end' => '0430', 'start' => '-', 'Subject' => '思修', 'info' => '第十周 - 微电影制作与展示', 'annex' => ''],
    ['end' => '0429', 'start' => '0426', 'Subject' => 'Android', 'info' => '完成chapter2~3和实验3。', 'annex' => 'Android-4月29日交.zip'],
//    ['end' => '0426', 'start' => '0424', 'Subject' => 'SQL Server', 'info' => '按“第八章-上机实验二”的要求编写实验报告', 'annex' => 'sql-第八章-上机实验二.doc'],
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
<?php include_once("../part/nav.php") ?>
<header>
    <div>
        <p><span>Work List</span></p>
        <p>Update for 4/27</p>
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
