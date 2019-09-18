<?php


class WorkInfo
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

    function getWorkInfo($need_upload = true, $start = "", $end = "")
    {
        $sql = "SELECT * FROM yeek.upwork_work WHERE true";
        if ($need_upload) {
            $sql .= " AND need_upload=true";
        }
        if (!empty($start)) {
            $sql .= " AND start>='$start'";
        }
        if (!empty($end)) {
            $sql .= " AND start>='$end'";
        }
        var_dump($sql);
        $result = $this->db->myQuery($sql);
        return $result;
    }

    function insertWork($name, $subject, $start, $end,  $need_upload,$annex, $remarks)
    {
        $sql = "INSERT INTO `yeek`.`upwork_work` (`name`, `subject`, `start`, `end`, `annex`, `remarks`, `need_upload`) 
VALUES (:name, :subject, :start, :end, :annex, :remarks, :need_upload);";
        $values = [
            'name' => $name,
            'subject' => $subject,
            'start' => $start,
            'end' => $end,
            'need_upload' => $need_upload,
            'annex' => $annex,
            'remarks' => $remarks,
        ];
        $result = $this->db->myExecute($sql,$values);
        return $result;
    }

}
