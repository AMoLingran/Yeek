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
$list = [['Subject' => '数学', 'info' => '课本 P49 2(2)(4)、3(2)(4) 写本子上，上课交 ', 'annex' => ''],
    ['Subject' => '英语', 'info' => 'B级准备课堂表演节目，女生之后从713开始，节目单发学委', 'annex' => ''],
    ['Subject' => 'Java', 'info' => '抽象类、接口的定义和使用，写本子上，上课交', 'annex' => 'java - 实验二.ppt'],
    ['Subject' => 'SQL server', 'info' => '做ER图，做完上交到sqlwork', 'annex' => 'SQL第二次作业下星期三交学委.docx'],
    ['Subject' => 'php', 'info' => '①3.21的课堂笔记复写 ②在线练习可以做到第四', 'annex' => '1809.3.21.txt']
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>周末作业 demo</title>
    <link rel="icon" href="/logo.png" sizes="32x32">
    <link href="/navAndFooter.css" type="text/css" rel="stylesheet"/>
    <link href="default.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<?php include("../part/nav.php") ?>
<header>
    <div><p>Software1809</p>
        <p><span>周 末 作 业</span></p>
        <p>0323 清单和课件</p>
        <p><?php echo $hostname ?>版</p>
    </div>
</header>
<main>
    <div>
        <?php foreach ($list as $item) {
            echo "<p id=$counter>$counter. " . $item['Subject'] . '：</p>';
            echo '<p>' . $item['info'] . '</p><a href="annex/' . $item['annex'] . '">' . $item['annex'] . '</a>';
            $counter++;
        }
        ?>
    </div>
    <p id="OS">
        此页的：
        <a href="http://www.php.cn/blog/detail/11666.html">在线部分源码</a>
        <a href="weekendwork.zip">所有源码</a>
    </p>
</main>
<?php echo include("../part/sqlfooter.php") ?>
</body>
</html>
