<?php


class WorkInfo
{

    private $pdo;

    /**
     * WorkInfo constructor.
     * @param $pdo DBUtils
     */
    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * WorkInfo的内部查询类
     * @param $sql
     * @return array|mixed|null
     */
    private function query($sql){
        $pdo = $this->pdo;
        $result = $pdo->myQuery($sql);
        return $result;
    }

    /**
     * 获取所有作业数组
     * @return array|mixed|null
     */
    function getAllWorkInfo(){
        $sql ="SELECT work.*,class.name  FROM work,class WHERE work.subject = class.callname AND need_upload=true";
        return $this->query($sql);
    }

    /**
     * 获取需要上传的作业数组
     * @return array|mixed|null
     */
    function getNeedUploadWork(){
        //日期条件
        $sql ="SELECT work.*,class.name AS NAME FROM work,class WHERE work.subject = class.callname AND need_upload=true AND TO_DAYS(end)-TO_DAYS(now())>0";
        return $this->query($sql);
    }

}