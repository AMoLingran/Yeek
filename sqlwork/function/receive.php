<?php
/**
 * Created by PhpStorm.
 * User: MoLingran
 * Date: 3/19 0019
 * Time: 22:39
 */

function coding($in_charset)
{
    if (PATH_SEPARATOR == ':') {
        return iconv( 'GBK','UTF-8', $in_charset);
    } else {
        return iconv('UTF-8', 'GBK', $in_charset);
    }
}
if(isset($_FILES))
$fileInfo = $_FILES['upload'];
if (move_uploaded_file($fileInfo['tmp_name'], "file/" . coding($fileInfo['name']))) {
    echo '成功同步到外网';
}else{
    echo '同步外网失败，错误代码：'.$_FILES['file']['error'];
}