<?php

function my_autoloader($class)
{
    include '../class/' . $class . '.class.php';
}

spl_autoload_register('my_autoloader');
$db = new DBUtilsOld();

//if(isset($_POST['workId'])){
//    $id = $_POST['workId'];
//   $result =  $db->myQuery("SELECT * FROM upwork_work WHERE id=$id");
//   echo $result['name'];
//}

if (isset($_POST['workId'])) {
    $id = $_POST['workId'];
    $result = $db->myQuery("SELECT a.name,a.end,b.name AS 'subject',b.call_name FROM upwork_work a,upworkl_course b WHERE a.courseId=b.id AND a.id=$id");
    $info=[
        'name'=>$result[0]['name'],
        'end'=>$result[0]['end'],
        'subject'=>$result[0]['subject'],
        'call_name'=>$result[0]['call_name'],
    ];
    echo json_encode($info);
//    echo $result[0]['name'];
//    echo $result[0]['end'];
}