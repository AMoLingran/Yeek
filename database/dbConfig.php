<?php
function getPDO($dbType, $dbHost, $dbName, $dbCharset, $dbUsername, $dbPassword)
{
    $dsn = "$dbType:host=$dbHost;dbname=$dbName;charset=$dbCharset";
    try {
        $pdo = new PDO($dsn, $dbUsername, $dbPassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        exit("连接出错" . $e->getMessage());
    }
    return $pdo;
}

$pdo = getPDO("mysql", "localhost", "yeek", "utf8", "moreant", "moreant");



