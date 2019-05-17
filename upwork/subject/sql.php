<?php
if(!isset($_COOKIE['tips_sql'])){
//echo "<script language=\"JavaScript\">alert(\"第九章上机实验三已经上交老师，补交请联系老师。\");</script>";
setcookie('tips_sql',"tips_sql",time()+ 3*60);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>SQL Work</title>
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
</head>

<header>
    <div>
        <p><span>SQL Work</span></p>
        <p>第十章上机实验一 - Work on 5/16（中午前）</p>
        <p><?php echo $domainInfo['name']; ?> - Bate1.1</p>
    </div>
</header>



