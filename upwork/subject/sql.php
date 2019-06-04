<?php
if(!isset($_COOKIE['tips_sql'])){
//echo "<script language=\"JavaScript\">alert(\"第十章上机实验一已经上交老师，补交请联系老师。 --5/16\");</script>";
//setcookie('tips_sql',"tips_sql",time()+ 3*60);
}


if(!isset($pdo)){
    exit('连接数据库失败');
}


require_once "function/getWorkInfo.php";
$work = getWorkInfo($pdo,1);
?>
    <style>
        header {
            width: 100%;
            height: 350px;
            background: #2c2c2f;
            color: white;
            font-family: 'Myriad', 'mini_思源黑体L', '思源黑体L';
            font-size: 225%;
        }
    </style>
<header>
    <div>
        <p><span><?php echo $work['subName']?></span></p>
        <p><?php echo $work['name'] . "&nbsp;&nbsp; | &nbsp;&nbsp;" . $work['end']; ?></p>
        <p><?php echo $domainInfo['name'] . " - " . $version; ?></p>
    </div>
</header>



