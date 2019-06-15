<?php

function my_autoloader($class)
{
    include '../class/' . $class . '.class.php';
}

spl_autoload_register('my_autoloader');
$db = new DBUtils();

//if(isset($_POST['workId'])){
//    $id = $_POST['workId'];
//   $result =  $db->myQuery("SELECT * FROM upwork_work WHERE id=$id");
//   echo $result['name'];
//}

if (isset($_POST['workId'])) {
    $id = $_POST['workId'];
    $result = $db->myQuery("SELECT a.name,a.end,b.name AS 'subject' FROM upwork_work a,upworkl_course b WHERE a.courseId=b.id AND a.id=$id");
    echo json_encode(array ('name'=>$result[0]['name'],'end'=>$result[0]['end'],'subject'=>$result[0]['subject']));
//    echo $result[0]['name'];
//    echo $result[0]['end'];
}