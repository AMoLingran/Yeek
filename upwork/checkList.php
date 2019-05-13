<?php
//$domain = $_SERVER['HTTP_HOST'];
date_default_timezone_set('PRC');
$counter = 0;
if(!isset($_SESSION['subject'])){
    $_SESSION['subject']="sql";
}
$domainInfo= include_once("../part/Position.php");
$host = $domainInfo['domain'];
$url = "http://$host/upwork/gitList_".$_SESSION['subject'].".php";
$html = file_get_contents($url);
$pattern = '#<br>#';
$array = preg_split($pattern, $html, -1, PREG_SPLIT_NO_EMPTY);

function getList()
{
    $url = "http://yeek.top/sqlwork/gitList_".$_SESSION['subject'].".php";
    $html = file_get_contents($url);
    $pattern = '#<br>#';
    return $array = preg_split($pattern, $html, -1, PREG_SPLIT_NO_EMPTY);
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SQL Server - 查看文件列表</title>
    <style type="text/css">
        fieldset {
            padding: 5%;
            text-align: center;
            margin: 5% 10%;
        }

        .a {
            text-align: center;
            display: block;
        }
        table, th, td {
            border: 1px solid #4c4c4c;
            padding: 10px;
        }

        table {
            border-collapse: collapse;
            text-align: center;
            margin: auto;
        }

        tbody td:hover {
            background-color: #efefef;
        }

    </style>
    <link rel="icon" href="/logo.png" sizes="32x32">
    <link href="default.css" type="text/css" rel="stylesheet">
    <link href="/navAndFooter.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<?php include_once("../part/nav.php") ?>
<?php include_once("function/select.php") ?>
<fieldset>
    <legend>你访问时的间为 <span><?php echo date("H:i:s") ?></span>
        , 正在查看 <span><?php echo $_SESSION['subject'] ?></span> 的上交情况
    </legend>
    <table>
        <tr>
            <?php foreach ($array as $item) : $counter++; ?>
                <td><?php echo "$item"; ?></td>
                <?php if ($counter % 10 == 0) echo "<tr></tr>"; endforeach; ?>
        </tr>
    </table>
</fieldset>
<br>
<a class="a" href="/upwork">返回上一页</a>
<br><br><br>
<?php include_once("../part/sqlfooter.php") ?>
</body>
</html>