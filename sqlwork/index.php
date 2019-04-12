<?php
date_default_timezone_set('PRC');
$file = array();
$suffixs = array('docx', 'doc', 'pptx', 'ppt', 'txt', 'java', 'zip', 'rar');
if (!file_exists('file')) {
    mkdir('file', 0777);
    chmod('file', 0777);
    copy("function/downFile.php", 'file/index.php');
}

include_once("../part/Domain.php");
$domain = new Domain();
$domainInfo = $domain->getDomain();

function coding($in_charset)
{
    if (PATH_SEPARATOR == ':') {
        return $in_charset;
    } else {
        return iconv('UTF-8', 'GBK', $in_charset);
    }
}

function checkFile2($name)
{
    $list = array();
    global $suffixs;
    if (pathinfo($name, PATHINFO_EXTENSION) == "") {
        $counter = 0;
        foreach ($suffixs as $suffix) {
            $url = "file/" . coding($name) . '.' . $suffix;
            if (file_exists($url)) {
                $list[$counter]['name'] = $name;
                $list[$counter]['size'] = round(filesize($url) / 1024 / 1024, 2);
                $counter++;
            }
        }
    } else {
        $url = "file/" . coding($name);
        if (file_exists($url)) {
            $list[0]['name'] = $name;
            $list[0]['size'] = round(filesize($url) / 1024 / 1024, 2);
        }

    }
    return $list;
}

function checkFile($name)
{
    global $file, $counter;
    $url = "file/" . coding($name);
    if (file_exists($url)) {
        $file[$counter]['name'] = $name;
        $file[$counter]['size'] = round(filesize($url) / 1024 / 1024, 2);
        $counter++;
    }
}

function moveFile($fileInfo)
{
    if (move_uploaded_file($fileInfo['tmp_name'], "file/" . coding($fileInfo['name']))) {
        return $fileArray = [
            'name' => $fileInfo['name'],
            'size' => round($fileInfo['size'] / 1024 / 1024, 2),
            'uploadResult' => upload($fileInfo),
            'error' => $fileInfo['error']
        ];
    } else {
        return $fileArray = [
            'error' => $fileInfo['error']
        ];
    }
}

function upload($fileInfo)
{ // 模拟提交数据函数
    if (PATH_SEPARATOR == ';') {
        $filePath = dirname(__FILE__) . "/file/" . coding($fileInfo['name']);
        $fileName = coding($_FILES['file']['name']);
        $fileArgs['upload'] = new CURLFile($filePath, 'file/exgpd', $fileName);
        $curl = curl_init('https://yeek.top/sqlwork/function/receive.php'); // 启动一个CURL会话
        curl_setopt($curl, CURLOPT_POST, 1); // 发送一个常规的Post请求
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $fileArgs); // Post提交的数据包
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($curl);   //执行操作
        if (curl_errno($curl)) {
            echo 'Errno' . curl_error($curl);
        }
        curl_close($curl);   // 关键CURL会话
        return $result;     // 返回数据
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
        echo '<p>文件名：<span>' . $fileArray['name'] . '</span></p>';
        echo '大小：<span>' . $fileArray['size'] . '</span> MB<br>上交成功<br>';
        echo $fileArray['uploadResult'];
//setcookie
        $time = date("Y/m/d H:i:s");
        setcookie('sqlwork[name]', $fileArray['name'], time() + 3 * 24 * 3600);
        setcookie('sqlwork[size]', $fileArray['size'], time() + 3 * 24 * 3600);
        setcookie('sqlwork[time]', $time, time() + 3 * 24 * 3600);
    } else {
        echo '<span>上传失败，错误代码：</span>' . $fileArray['error'];
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>SQL Work</title>
    <link rel="icon" href="/logo.png" sizes="32x32">
    <link href="/navAndFooter.css" type="text/css" rel="stylesheet"/>
    <link href="default.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<?php include("../part/nav.php") ?>
<header>
    <div>
        <p><span>SQL Work</span></p>
        <p>Work for 4/17 </p>
        <p><?php echo $domainInfo['name']; ?>版</p>
    </div>
</header>
<main>
    <section id="input">
        <div>
            <form method="post" name="checkForm">
                <label>
                    <input type="text" name="name" id="name" placeholder="查询文件名" required="required"/>
                    <input type="submit" name="check" id="check" value="查询"/>
                </label>
            </form>
        </div>
        <div>
            <form method="post" enctype="multipart/form-data">
                <label for="file" id="file_input">
                <input type="file" name="file" id="file" required="required"/>
                </label>
                <input type="submit" name="update" id="update" value="上传"/>
            </form>
            <br>
        </div>
    </section>
    <br>

    <section>
        <div id="result">
            <?php
            if (isset($_POST['check'])) {
                /*foreach ($suffixs as $suffix) {
                    checkFile($_POST['name'] . "." . $suffix);
                }*/
                $result = checkFile2($_POST['name']);
                if (count($result) > 0) {
                    showCheck($result);
                } else {
                    echo "<span class='blue'>没有找到“</span>" . $_POST['name'] . "”的相关文件";
                }
            }
            ?>

            <?php
            if (isset($_POST['update'])) {
                $fileInfo = $_FILES['file'];
                $match = false;
                foreach ($suffixs as $suffix) {
                    $fileName = $fileInfo['name'];
                    if ((pathinfo($fileName, PATHINFO_EXTENSION)) == $suffix) {
                        $result = checkFile2($fileName);
                        if (count($result) > 0) {
                            showCheck($result);
                            $match = true;
                        } else {
                            showUpload(moveFile($fileInfo));
                            $match = true;
                        }
                    }
                }
                if (!$match) {
                    echo "<span>上传失败</span><br>你上传的文件格式不合法，请查看下面的说明";
                }

            }
            ?>
        </div>
    </section>
    <div id="historical">
        <?php
        if (isset($_COOKIE['sqlwork'])) {
            $historical = $_COOKIE['sqlwork'];
            echo '<p>你在 <span class="blue">' . $historical['time'] . "</span> 上传了：";
            echo '<span class="blue">' . $historical['name'] . '</span>';
            echo '，<span class="blue">' . $historical['size'] . '</span> MB';
            echo ' 的文件</p>';
        }
        ?>
    </div>
    <div id="readme">
        <p>上课当天上交的请在上课前找我确认</p>
        <p>PS：断网后上传需耐心等待</p>
        <br>
        <p>
            <a href="/worklist" target="_blank">作业内容</a>
            <a href="checkList.php">上交名单</a>
            <a href="https://gitee.com/Moreant/schoolwork">某人答案</a>
        </p>
        <br>
        <p>①仅支持上传和搜索<?php foreach ($suffixs as $item): echo " " . $item . ","; endforeach; ?>后缀的文件</p><br>
        <p>②要替换旧文件在新文件名后面加个“2”就行</p><br>
        <p>③别忘了检查一下文件大小是否一致</p><br>
        <p>④检查不到文件可能是我还没有同步内外网</p><br><br>

        <p><a href="http://<?php echo $domainInfo['domain'] ?>/SQLServer">SQL Server 安装教程与下载</a></p>
    </div>
</main>
<?php include_once("../part/sqlfooter.php") ?>
</body>
</html>


