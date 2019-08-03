<?php
include_once "myHead.php";
$ge = 1;
$get = @$_GET['g'];
$n = 4;
$db = new DBUtils();
$result = $db->myQuery("SELECT * FROM yeek.yeek_student order by 4");
var_dump($result);
?>

