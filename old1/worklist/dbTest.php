<?php
function setPdo(){
    $dbType="mysql";
    $dbHost="localhost";
    $dbName="yeek";
    $dbUsername="moreant";
    $dbPassword="moreant";
    $dbCharset="utf8";
    $dsn="$dbType:host=$dbHost;dbname=$dbName;charset=$dbCharset";
    try{
        $pdo = new PDO($dsn,$dbUsername,$dbPassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }catch (PDOException $error){
        exit("错误".$error->getMessage());
    }
}

$pdo = setPdo();

$result = $pdo->query("SELECT * FROM work ");
var_dump($result->fetchAll());