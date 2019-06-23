<?php
include_once "../myHead.php";
$db = new DBUtils();
$file = new File($db);



if(!isset($_FILES['file'])){
    exit("你的打开方式不正确");
}
$fileInfo=$_FILES['file'];//获取上称文件的信息，数组形式
$dir = $_POST['dir'].'/';
if (PHP_OS == 'WINNT') {
    $fileName = iconv("UTF-8","GBK",$fileInfo['name']);
}else {
    $fileName=$fileInfo['name'];
}
if (!file_exists($dir)) {
    mkdir($dir);
    chmod($dir, 0777);
}

/**
 * 1 上传成功
 * -1未知错误
 * -2文件已存在
 */

if(file_exists("$dir".$fileName)){

//    header('content-type:application/json;charset=utf-8');
    echo   json_encode(array(
        'code'=>-2,
        "request"=>"文件已存在",
    ));
    exit();
}
if(move_uploaded_file($fileInfo['tmp_name'],$dir.$fileName)){
    chmod($dir.$fileName, 0777);
    $workId = $_POST['workId'];
    $fileSize = $fileInfo['size'];
    $uploader = "unknown";

    $file->insertFile($workId,$fileInfo['name'],$fileSize,$uploader);
    echo   json_encode(array(
        'code'=>1,
        "request"=>"文件上传成功",
    ));
    exit();
}
echo -1;
?>