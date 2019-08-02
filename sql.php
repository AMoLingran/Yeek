<?php
include_once "myHead.php";
$get = @$_GET['g'];
$n = 4;
$db = new DBUtils();
$result = $db->myQuery("SELECT * FROM yeek.yeek_student WHERE id=$get");
var_dump($result);