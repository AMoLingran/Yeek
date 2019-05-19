<?php
if(!isset($_COOKIE['tips_android'])) {
    echo "<script language=\"JavaScript\">alert(\"lab4已经上交老师，补交请联系老师。 --5月15日\");</script>";
    setcookie('tips_android',"tips_android",time()+ 3*60);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Android Work</title>
    <style>
        header {
            width: 100%;
            height: 350px;
            background: #378c42;
            color: white;
            font-family: 'Myriad', 'mini_思源黑体L', '思源黑体L';
            font-size: 225%;
        }
    </style>
</head>
<header>
    <div>
        <p><span>Android Work</span></p>
        <p>lab4 - Work on 5/15</p>
        <p><?php echo $domainInfo['name']; ?> - Bate1.1</p>
    </div>
</header>
</html>


