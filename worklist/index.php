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
    ['end' => '0422', 'start' => '0418', 'Subject' => 'php', 'info' => '复写课堂笔记', 'annex' => 'php-1809.5.6.txt'],
    ['end' => '0514', 'start' => '-', 'Subject' => '英语', 'info' => 'B级视频展示，717下周二（5/14）上台', 'annex' => ''],
    ['end' => '0507', 'start' => '-', 'Subject' => '思修', 'info' => '5月9日 49-52号上台', 'annex' => ''],
    ['end' => '0506', 'start' => '0430', 'Subject' => '数学', 'info' => '课本P177 5(1)、P117 8(2)', 'annex' => ''],
    ['end' => '0505', 'start' => '0426', 'Subject' => 'Android', 'info' => '完成chapter2~3和实验3', 'annex' => 'Android-4月29日交.zip'],
    ['end' => '0509', 'start' => '0428', 'Subject' => 'JavaSE', 'info' => '见课件', 'annex' => 'java-作业六.ppt'],
    ['end' => '0426', 'start' => '0424', 'Subject' => 'SQL Server', 'info' => '按“第9章上机实验二”的要求编写实验报告', 'annex' => 'sql-第9章上机实验二.doc'],
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
        <p><span>作业清单</span></p>
        <p>Update for 5/8</p>
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
