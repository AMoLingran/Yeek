<?php


class File
{
    private $db;


    /**
     * WorkInfo constructor.
     * @param $db DBUtils
     */
    function __construct($db)
    {
        $this->db = $db;
    }


    function insertFile($uploadId,$fileName,$fileSize,$fileDir="" )
    {
        $db = $this->db;
        $sql = "INSERT INTO upwork_file(uploadId, fileName,fileSize,fileDir) 
                VALUES(:uploadId,:fileName,:fileSize,:fileDir)";
        $data = array(
            'uploadId'=>$uploadId,
            'fileName'=>$fileName,
            'fileSize'=>$fileSize,
            'fileDir'=>$fileDir,
        );
        $result = $db->myExecute($sql,$data);
        return $result;
    }



    function countSize($size){
        $units = array(' B', ' KB', ' MB', ' GB', ' TB');
        for ($i = 0; $size >= 1024 && $i < 4; $i++) {
            $size /= 1024;
        }
        $fileSize = round($size, 2) . $units[$i];
        return $fileSize;
    }
}