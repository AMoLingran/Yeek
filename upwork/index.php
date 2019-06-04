<?php
if (!session_id()) {
    session_start();
}
date_default_timezone_set('PRC');
//获取科目php

include_once("../part/encoding.php");
require_once("function/subject.php");
require_once "../database/dbConfig.php";
require_once "function/getWorkInfo.php";

$domainInfo = include_once("../part/Position.php");
$suffixs = array('docx', 'doc', 'pptx', 'ppt', 'txt', 'java', 'zip', 'rar', 'mp4');
$version = "bate 2.0";
@$subject = $_SESSION['subject'];
$file = array();

$pdo = getPDO("mysql", "localhost", "yeek", "utf8", "moreant", "moreant");

if (!isset($subject_url)) {
    $subject_url = "";
}
$workId=0;
if ($subject === "android") {
    $workId=5;
    $subjectColor = "#378c42";
}
if ($subject === 'sql') {
    $workId=1;
    $subjectColor = "#2c2c2f";
}
$work = getWorkInfo($pdo, $workId);

function insertUploadInfo($fileName, $date, $workId, $fileSize)
{
    global $pdo;
    $sql = "INSERT INTO `log_upwork_upload` (`fileName`, `date`, `uploader`, `workId`, `fileSize`) 
VALUES (?,?, ?,?, ?)";
    $pdoS = $pdo->prepare($sql);

    $pattern = "#(\d+)(?<=(\w))#";
    preg_match($pattern, $fileName, $uploader);
    if (isset($uploader[0])) {
        $uploader = $uploader[0];
    } else {
        $uploader = "unknown";
    }

    $pdoS->execute(array($fileName, $date, $uploader, $workId, $fileSize));
    if ($pdoS->rowCount() === 1) {
        return true;
    } else {
        return false;
    }
}

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

    $subject = $_SESSION['subject'];
    $fileName = $fileInfo['name'];
    $fileSize = $fileInfo['size'];

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
            . "科目->'" . $subject
            . "',文件名->'" . $fileName
            . "',路径->'" . $updateFile
            . "']";
        //写入日志
        writeLog("update", $logStr);
        //返回成功结果

        $units = array(' B', ' KB', ' MB', ' GB', ' TB');
        for ($i = 0; $fileSize >= 1024 && $i < 4; $i++) {
            $fileSize /= 1024;
        }
        $fileSize = round($fileSize, 2) . $units[$i];

        return $fileArray = [
            'subject' => $subject,
            'name' => $fileName,
            'size' => $fileSize,
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
    global $workId;

    if ($fileArray['error'] == 0) {

        $subject = $_SESSION['subject'];
        $fileName = $fileArray['name'];
        $fileSize = $fileArray['size'];
        $dateTime = date("Y-m-d H:i:s");

        $insertResult = insertUploadInfo($fileName, $dateTime, $workId, $fileSize);

        if ($insertResult) {
            echo "<p>上交成功</p><p>[&nbsp;";
            echo "'科目'=><span>" . $subject . '&nbsp;,</span>';
            echo '&nbsp;\'文件名\'=><span>' . $fileName . '&nbsp;,</span>';
            echo '&nbsp;\'大小\'=><span>' . $fileSize . '</span>&nbsp;';
            echo '&nbsp;\'时间\'=><span class="blue">' . $dateTime . '</span>&nbsp;]</p>';

            //setcookie
            setcookie('last_upload[subject]', $subject, time() + 3 * 24 * 3600);
            setcookie('last_upload[name]', $fileName, time() + 3 * 24 * 3600);
            setcookie('last_upload[size]', $fileSize, time() + 3 * 24 * 3600);
            setcookie('last_upload[time]', $dateTime, time() + 3 * 24 * 3600);
        } else {
            echo "文件上传成功，但插入数据库失败";
        }

    } else {
        echo '<span>上传失败，错误代码：</span>' . $fileArray['error'];
    }
}

function writeLog($type, $logStr)
{
    $backupDir = "../log";
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
<style>
    header {
        background: <?php echo $subjectColor ?>;
    }
</style>
<body>
<?php include_once("../part/nav.php") ?>

<?php if (isset($work)): ?>
    <header>
        <div>
            <p><span><?php echo $work['subName'] ?></span></p>
            <p><?php echo $work['name'] . " - " . $work['end']; ?></p>
            <p><?php echo $domainInfo['name'] . " - " . $version; ?></p>
        </div>
    </header>
<?php else: include_once "subject/home.php"; endif; ?>

<?php include_once("function/select.php") ?>

<?php if (isset($work)): include_once('function/main.php');endif; ?>

<?php include_once("../part/sqlfooter.php") ?>
</body>
</html>
