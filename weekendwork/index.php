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
$list = [['Subject' => '数学', 'info' => '课本 P49 2(2)(4)、3(2)(4) 写本子上，上课交。', 'annex' => ''],
    ['Subject' => '英语', 'info' => 'B级准备课堂表演节目，713下下周五（4月12）上台。', 'annex' => ''],
    ['Subject' => 'Java', 'info' => '课本P97填空题 带题目抄写本子上，上课交。', 'annex' => ''],
    ['Subject' => 'SQL server', 'info' => '课本P100页 3.实训过程 写在word文档在本站上交.', 'annex' => ''],
    ['Subject' => 'php', 'info' => '①复写28日的课堂笔记 ②在线练习可以做到第四个。', 'annex' => '1809.3.28.txt']
];
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
        <p><span>周 末 作 业</span></p>
        <p>0330 清单和课件</p>
        <p><?php echo $hostname ?>版</p>
    </div>
</header>
<main>
    <div>
        <?php foreach ($list as $item) {
            echo "<p id=$counter>$counter. " . $item['Subject'] . '：</p>';
            echo '<p>' . $item['info'] . '</p><a href="annex/' . $item['annex'] . '" download>' . $item['annex'] . '</a>';
            $counter++;
        }
        ?>
    </div>
    <p id="OS">
        此页的：
        <a href="http://www.php.cn/blog/detail/11666.html">在线部分源码</a>
        <a href="https://github.com/AMoLingran/Yeek">在GitHub中</a>
    </p>
</main>
<?php echo include("../part/sqlfooter.php") ?>
</body>
</html>
