<?php
include_once "../myHead.php";
$db = new DBUtils();
$file = new File($db);
$dir = $_POST['dir'] . '/';
if (isset($_POST['list'])) {
    $arr = scandir($dir);
    $fileLinst = array();
    foreach ($arr as $index => $fileName) {
        if ($index > 1) {
            array_push($fileLinst, urldecode($fileName));
        }
    }
    echo json_encode($fileLinst);
    exit();
}

//获取上称文件的信息，数组形式
$fileInfo = $_FILES['file'];
$fileName = $fileInfo['name'];
if (!file_exists($dir)) {
    mkdir($dir);
    chmod($dir, 0777);
}

/**
 * 1 上传成功
 * -1未知错误
 * -2文件已存在
 */
if (file_exists("$dir" . $fileName)) {
    //    header('content-type:application/json;charset=utf-8');
    echo json_encode(array(
        'code' => -2,
        "request" => "文件已存在",
    ));
    exit();
}
if (move_uploaded_file($fileInfo['tmp_name'], $dir . $fileName)) {
    chmod($dir . $fileName, 0777);
    $fileName = $fileInfo['name'];
    $workId = $_POST['workId'];
    $fileSize = $fileInfo['size'];
    $datetime = date("Y-m-d H:i:s");
    echo json_encode(array(
        'code' => 1,
        "request" => "文件上传成功",
    ));
    exit();
}
echo -1;
