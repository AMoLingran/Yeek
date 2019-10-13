<?php

//if(isset($_POST['getWorkList'])){
//
//}

function getPDO($host = "localhost")
{
    $dsn = "mysql:host:$host;dbname=yeek;charset=utf8";
    try {
        $pdo = new PDO($dsn, "moreant", "moreant");
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    } catch (PDOException $e) {
        die("数据库连接失败" . $e->getMessage());
    }
    return $pdo;
}

$pdo = getPDO();

$date = date("Y-m-d");
$pdoStatement = $pdo->query("SELECT * FROM yeek.upwork_work a , yeek.upwork_course b WHERE a.courseId=b.id AND a.end>='$date'");
$workList = $pdoStatement->fetchAll();

echo json_encode($workList);


