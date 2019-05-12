<?php
session_start();
date_default_timezone_set('PRC');
$domainInfo = include_once("../part/Position.php");
if (isset($_GET['subject'])) {
    if (file_exists("subject/" . $_GET['subject'] . ".php")) {
        $subject_url = $_GET['subject'] . ".php";
        $subject_dir = "file_" . $_GET['subject'];
        if (!file_exists($subject_dir)) {
            mkdir($subject_dir, 0777);
            chmod($subject_dir, 0777);
        }
        if (!file_exists("$subject_dir/index.php")) {
            copy("function/downFile.php", "$subject_dir/index.php");
            chmod("$subject_dir/index.php", 0777);
        }
    } else {
        $subject_url = "home.php";
    }
} else {
    $subject_url = "home.php";
}
$file = array();
$suffixs = array('docx', 'doc', 'pptx', 'ppt', 'txt', 'java', 'zip', 'rar','mp4');
function checkFile($name)
{
    $list = array();
    global $suffixs;
    global $subject_dir;
    if (pathinfo($name, PATHINFO_EXTENSION) == "") {
        $counter = 0;
        foreach ($suffixs as $suffix) {
            $url = "$subject_dir/" . $name . '.' . $suffix;
            if (file_exists($url)) {
                $list[$counter]['name'] = $name;
                $list[$counter]['size'] = round(filesize($url) / 1024 / 1024, 2);
                $counter++;
            }
        }
    } else {
        $url = "$subject_dir/" . $name;
        if (file_exists($url)) {
            $list[0]['name'] = $name;
            $list[0]['size'] = round(filesize($url) / 1024 / 1024, 2);
        }

    }
    return $list;
}

function moveFile($fileInfo)
{
    global $subject_dir;
    if (move_uploaded_file($fileInfo['tmp_name'], "$subject_dir/" . $fileInfo['name'])) {
        return $fileArray = [
            'subject' => $_GET['subject'],
            'name' => $fileInfo['name'],
            'size' => round($fileInfo['size'] / 1024 / 1024, 2),
            'error' => $fileInfo['error']
        ];
    } else {
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
        echo "'科目'=><span>" . $_GET['subject'] . '&nbsp;,</span>';
        echo '&nbsp;\'文件名\'=><span>' . $fileArray['name'] . '&nbsp;,</span>';
        echo '&nbsp;\'大小\'=><span>' . $fileArray['size'] . '</span>MB&nbsp;';
        echo '&nbsp;\'时间\'=><span class="blue">' . $time . '</span>&nbsp;]</p>';

//setcookie
        setcookie('last_upload[subject]', $_GET['subject'], time() + 3 * 24 * 3600);
        setcookie('last_upload[name]', $fileArray['name'], time() + 3 * 24 * 3600);
        setcookie('last_upload[size]', $fileArray['size'], time() + 3 * 24 * 3600);
        setcookie('last_upload[time]', $time, time() + 3 * 24 * 3600);
    } else {
        echo '<span>上传失败，错误代码：</span>' . $fileArray['error'];
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
