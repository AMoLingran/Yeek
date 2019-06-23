<?php


class DBUtilsOld
{

    public $pdo;

    /**
     * DBUtils constructor.
     * @param string $dbHost
     * @param string $dbUsername
     * @param string $dbPassword
     */
    function __construct($dbHost = "localhost", $dbUsername = "moreant", $dbPassword = "moreant")
    {
        $dsn = "mysql:host=$dbHost;dbname=yeek;charset=utf8";
        try {
            $pdo = new PDO($dsn, $dbUsername, $dbPassword);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (PDOException $e) {
            exit("连接出错" . $e->getMessage());
        }
        $this->pdo = $pdo;
    }

    /**
     * 自定义（方便的）查询方法
     * @param $sql string 查询语句
     * @param null $array 传入参数
     * @param bool $all 获取最后一个结果还是所有结果
     * @return array|null 成功返回数组，失败返回null
     */
    function myQuery($sql, $array = null, $all = true)
    {
        $pdo = $this->pdo;
        $pdoS = $pdo->prepare($sql);
        $execute = $pdoS->execute($array);
        if ($execute) {
            if ($all) {
                return $pdoS->fetchAll();
            } else {
                return $pdoS->fetch();
            }
        } else {
            echo "查询失败";
        }
        return null;
    }

    /**
     * @param $sql
     * @param null $array
     * @return int|null
     */
    function myExecute($sql, $array = null)
    {
        $pdo = $this->pdo;
        $pdoS = $pdo->prepare($sql);
        $execute = $pdoS->execute($array);
        if ($execute) {
            return $pdoS->rowCount();
        } else {
            return $pdoS->errorCode();
        }
    }

}