<?php
if(!isset($_FILES['file'])){
    exit("你的打开方式不正确");
}
$fileInfo=$_FILES['file'];//获取上称文件的信息，数组形式
$dir = $_GET['fileUrl'].'/';
if (PHP_OS == 'WINNT') {
    $fileName = iconv("UTF-8","GBK",$fileInfo['name']);
}else {
    $fileName=$fileInfo['name'];
}
if (!file_exists($dir)) {
    mkdir($dir);
    chmod($dir, 0777);
}
if(file_exists("$dir".$fileName)){
    echo -2;
    exit();
}
if(move_uploaded_file($fileInfo['tmp_name'],$dir.$fileName)){
    chmod($file, 0777);
    echo 1;
    exit();
}
echo -1;
?>