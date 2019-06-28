<?php

/**
 * Class Account
 * 待填的坑：
 * 检查用户输入
 */

class Account
{
    public $pdo;

    /**
     * 实例化需要pdo对象（应该能节省内存？）
     * account constructor.
     * @param DBUtils $pdo
     *
     */
    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


    /**
     *登录的方法
     * @param string $username
     * @param string $password
     * @return array|null
     */
    function login($username, $password){
        $pdo = $this->pdo;
        $sql = "SELECT * FROM yeek_user WHERE username='$username' AND password='$password'";
        $result = $pdo->myQuery($sql);
        return $result;
    }


    /**
     * 注册的方法
     * email可省略
     *
     * @param $username
     * @param $password
     * @param string $email
     * @return int|null
     */
    function register($username, $password, $email=""){
        $pdo = $this->pdo;
        $createTime = date("Y-m-d H:i:s");
        $sql = "INSERT INTO yeek_user(username, password,create_time, email)  VALUES ('$username','$password','$createTime','$email')";
        $result = $pdo->myExecute($sql);
        return $result;
    }

    /**
     * 检查在user表是否存在，如果在就返回数据
     *
     * @param $columns
     * @param $values
     * @return array|null
     */
    function checkUserInfo($columns, $values){
        $pdo = $this->pdo;
        $sql = "SELECT * FROM yeek_user WHERE $columns=?";
        $result = $pdo->myQuery($sql,array($values));
        return $result;
    }

}


