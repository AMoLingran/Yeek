<?php
$file = array();
$local = $_SERVER['SCRIPT_NAME'];
$suffixs = array('docx', 'doc', 'pptx', 'ppt', 'txt', 'java', 'php', 'zip', 'rar');
if (!file_exists('file')) {
    mkdir('file', 0777);
    chmod('file', 0777);
    copy("function/downFile.php", 'file/index.php');
}
if (PATH_SEPARATOR == ':') {
    //Linux
    $hostname = '一客';
} else {
    //Windows
    $hostname = '校园网';
}
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
    return "error";
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
    } else {
        echo '<span>上传失败，错误代码：</span>' . $fileArray['error'];
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>SSW</title>
    <style>
        fieldset {
            width: 325px;
            height: 50px;
            padding: 20px;
            margin: 5% 0;
        }
    </style>
    <link rel="icon" href="/logo.png" sizes="32x32">
    <link href="/navAndFooter.css" type="text/css" rel="stylesheet"/>
    <link href="default.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<?php include("../part/nav.php") ?>
<header>
    <div><p>Software1809</p>
        <p><span>SQL Server Work </span></p>
        <p>Upload</p>
        <p><?php echo $hostname ?>版</p>
    </div>
</header>
<main>

    <section>
        <div>
            <fieldset>
                <legend>查询作业是否已上交</legend>
                <form method="post" name="checkForm">
                    文件名
                    <label>
                        <input type="text" name="name" required="required"/>
                        <input type="submit" name="check" value="查询"/>
                    </label>
                </form>
            </fieldset>
            <br>
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
        </div>
        <div>
            <form method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>上交作业</legend>
                    <label for="myfile"></label>
                    <input type="file" name="file" required="required"/>
                    <input type="submit" name="file" value="上传"/>
                </fieldset>
            </form>
            <br>
            <?php
            if (isset($_POST['file'])) {
                $fileInfo = $_FILES['file'];
                foreach ($suffixs as $suffix) {
                    $fileName = $fileInfo['name'];
                    if ((pathinfo($fileName, PATHINFO_EXTENSION)) == $suffix) {
                        checkFile($fileInfo['name']);
                        if (count($file) > 0) {
                            showCheck($file);
                        } else {
                            showUpload(moveFile($fileInfo));
                        }
                    }
                }
            }
            ?>
        </div>
    </section>
    <div id="readme">
        <p>上课当天上交的请在上课前找我确认</p>
        <p>PS：断网后上传需耐心等待</p>
        <br>
        <a href="/worklist" target="_blank">查看本次作业内容</a>
        <p><a href="checkList.php">查看上交名单</a></p>
        <p><a href="https://gitee.com/Moreant/schoolwork">查看某人答案</a></p>
        <br>
        <p>文件搜索支持模糊<?php foreach ($suffixs as $item): echo $item;
            endforeach; ?>后缀的文件</p>
        <p>要替换旧文件在新文件名后面加个“2”就行</p>
        <p>别忘了检查一下文件大小是否一致</p>
        <p>检查不到文件可能是我还没有同步内外网</p>
    </div>
</main>
<?php include("../part/sqlfooter.php") ?>
</body>
</html>


