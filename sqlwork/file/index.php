<?php
/**
 * Created by PhpStorm.
 * User: MoLingran
 * Date: 3/16 0016
 * Time: 16:06
 */
$counter = 0;
$list = array();
$path = __DIR__;
$result = glob($path . '/*.*');
foreach ($result as $item) {
    if (PATH_SEPARATOR == ':') {
        $str = str_replace($path . "/", "", $item);
    } else {
        $str = str_replace($path . "/", "", iconv('GBK', 'UTF-8', $item));
    }
    if($str=="index.php" | $str=='linux.php'){
        continue;
    }else{
        $list[] = $str;
    }
}
if (!isset($set)) {
    $set = "";
    $in='..';
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>Document</title>
    <style>
        fieldset {
            padding: 5% 0;
            text-align: center;
            margin: 5% 10%;
        }
        legend {
            text-align: center;
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
</head>
<body>
<fieldset>
    <legend>下载 <span><?php echo __DIR__ ?></span> 的文件</legend>
    <br><br>
    <table>
        <tr>
            <?php foreach ($list as $item) : $counter++; ?>
                <td><?php echo "<a href='$set$item'>$item"; ?></a></td>
                <?php if ($counter % 5 == 0) echo "<tr></tr>"; endforeach; ?>
        </tr>

    </table>
    <br>
    <?php include("$in/zip.php"."") ?>
    <br><br>
</fieldset>
</body>
</html>
