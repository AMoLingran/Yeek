<?php

include_once "../myHead.php";
//删除cookie 设置时间为过去，由于是从其他目录导入的，需要特别指定cookie的路径
setcookie("username", "", time() - 3600,"/new");
?>