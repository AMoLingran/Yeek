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


    function insertFile($workId,$fileName,$fileSize,$uploader,$fileDir="" )
    {
        $db = $this->db;
        $sql = "INSERT INTO upwork_file(workId, fileName,fileSize, uploader,fileDir) 
                VALUES(:workId,:fileName,:fileSize,:uploader,:fileDir)";
        $data = array(
            'workId'=>$workId,
            'fileName'=>$fileName,
            'fileSize'=>$fileSize,
            'uploader'=>$uploader,
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