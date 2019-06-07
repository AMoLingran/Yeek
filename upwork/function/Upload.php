<?php


class Upload
{
    private $pdo;

    /**
     * Upload constructor.
     * @param $pdo PDO
     */
    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


    /**
     * Check if the file exists
     * @param $fileName string
     * @param $workId int
     * @return bool true file exists,false not file exists
     */
    function fileIsExists($fileName, $workId)
    {
        $pdo = $this->pdo;
        $sql = "SELECT log_upwork_upload.fileName FROM log_upwork_upload,work 
                WHERE work.id=:id AND fileName=:fileName";
        $pdoS = $pdo->prepare($sql);
        $exec = $pdoS->execute(array('id' => $workId, 'fileName' => $fileName));
        if ($exec & $result = $pdoS->fetch()) {
            return true;
        }else{
            return false;
        }
    }


    /**
     * move upload file
     * @param $fileInfo array
     * @param $fileDir string
     * @return bool
     */
    function moveFile($fileInfo,$fileDir){
        if(move_uploaded_file($fileInfo['tmp_name'],$fileDir.$fileInfo['name'])){
            return true;
        }else{
            return false;
        }
    }

}