<?php
if (!session_id()) {
    session_start();
}
date_default_timezone_set('PRC');
include_once("../part/encoding.php");
include_once("function/subject.php");
if (!isset($subject_url)) {
    $subject_url = "home.php";
}


$domainInfo = include_once("../part/Position.php");
$file = array();

$suffixs = array('docx', 'doc', 'pptx', 'ppt', 'txt', 'java', 'zip', 'rar', 'mp4');
function checkFile($name)
{
    $list = array();
    global $suffixs;
    global $subject_dir;
    if (pathinfo($name, PATHINFO_EXTENSION) == "") {
        $counter = 0;
        foreach ($suffixs as $suffix) {
            $url = "$subject_dir/" . encoding($name) . '.' . $suffix;
            if (file_exists($url)) {
                $list[$counter]['name'] = $name;
                $list[$counter]['size'] = round(filesize($url) / 1024 / 1024, 2);
                $counter++;
            }
        }
    } else {
        $url = "$subject_dir/" . encoding($name);
        if (file_exists($url)) {
            $list[0]['name'] = $name;
            $list[0]['size'] = round(filesize($url) / 1024 / 1024, 2);
        }

    }
    return $list;
}

function moveFile($fileInfo)
{
    global $subject;
    //没有科目说明被异常打开
    if (is_null($subject)) {
        exit("打开错误,请联系开发者");
    }
    $tempFile = $fileInfo['tmp_name'];
    $updateFile = "file_" . $subject . "/" . $fileInfo['name'];
    //如果文件移动成功
    if (move_uploaded_file($tempFile, encoding($updateFile))) {
        //设定上传文件的权限为777
        chmod(encoding($updateFile), 0777);

        //日志字符串
        $logStr = "上传成功["
            . "科目->'" . $_SESSION['subject']
            . "',文件名->'" . $fileInfo['name']
            . "',路径->'" . $updateFile
            . "']";
        //写入日志
        writeLog("update", $logStr);
        //返回成功结果
        return $fileArray = [
            'subject' => $_SESSION['subject'],
            'name' => $fileInfo['name'],
            'size' => round($fileInfo['size'] / 1024 / 1024, 2),
            'error' => $fileInfo['error']
        ];
    } else {
        //返回错误结果
        return $fileArray = [
            'error' => $fileInfo['error']
        ];
    }
}

function showCheck($file)
{
    foreach ($file as $item) {
        echo "<p>找到了 <span>" . $item['name'] . "</span>文件</p>";
        echo "<p>大小为 " . $item['size'] . " MB</p><br>";
    }
}

function showUpload($fileArray)
{
    if ($fileArray['error'] == 0) {
        $time = date("Y/m/d H:i:s");

        echo "<p>上交成功</p><p>[&nbsp;";
        echo "'科目'=><span>" . $_SESSION['subject'] . '&nbsp;,</span>';
        echo '&nbsp;\'文件名\'=><span>' . $fileArray['name'] . '&nbsp;,</span>';
        echo '&nbsp;\'大小\'=><span>' . $fileArray['size'] . '</span>MB&nbsp;';
        echo '&nbsp;\'时间\'=><span class="blue">' . $time . '</span>&nbsp;]</p>';

        //setcookie
        setcookie('last_upload[subject]', $_SESSION['subject'], time() + 3 * 24 * 3600);
        setcookie('last_upload[name]', $fileArray['name'], time() + 3 * 24 * 3600);
        setcookie('last_upload[size]', $fileArray['size'], time() + 3 * 24 * 3600);
        setcookie('last_upload[time]', $time, time() + 3 * 24 * 3600);

    } else {
        echo '<span>上传失败，错误代码：</span>' . $fileArray['error'];
    }
}


function writeLog($type, $logStr)
{
    $backupDir = "../log_backup";
    $date = "time: " . date("Y/m/d H:i:s");
//    $logStr = iconv("UTF-8", "GBK", $logStr);
    if (!file_exists($backupDir)) {
        mkdir($backupDir);
        chmod($backupDir, 0777);
    }

    if ($type === "update") {
        $backupFile = $backupDir . "/log_upwork_update.txt";
        $logFile = fopen($backupFile, "a+");
        chmod($backupFile, 0777);
        fwrite($logFile, $date . "\t->\tmsg: " . $logStr . "\r\n");
        fclose($logFile);
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <title>作业上传</title>
    <meta charset="UTF-8">
    <link rel="icon" href="/logo.png" sizes="32x32">
    <link href="../navAndFooter.css" type="text/css" rel="stylesheet"/>
    <link href="default.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<?php include_once("../part/nav.php") ?>
<?php include_once('subject/' . $subject_url . "") ?>
<?php include_once("function/select.php") ?>
<?php if ($subject_url != "home.php"): ?>
    <?php include_once('function/main.php') ?>
<?php endif; ?>
<?php include_once("../part/sqlfooter.php") ?>
</body>
</html>
