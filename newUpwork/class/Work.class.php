<?php


class Work
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

    /**
     * @param string $id
     * @param string $name
     * @param string $subject
     * @param bool $need_upload
     * @param string $start
     * @param string $end
     * @return array|null
     */
    function selectWorkInfo($id = "", $name = "", $subject = "", $start = "", $end = "", $need_upload=true)
    {
        $sql = "SELECT * FROM yeek.upwork_work WHERE true";
        if (!empty($id)) {
            $sql .= " AND id = $id";
        }
        if (!empty($name)) {
            $sql .= " AND name LIKE '%$name%'";
        }
        if (!empty($subject)) {
            $sql .= " AND subject LIKE '%$subject%'";
        }
        if (!empty($start)) {
            $sql .= " AND start>='$start'";
        }
        if (!empty($end)) {
            $sql .= " AND end>='$end'";
        }
        if ($need_upload) {
            $sql .= " AND need_upload=$need_upload";
        }
        var_dump($sql);
        $result = $this->db->myQuery($sql);
        return $result;
    }

    function insertWork($name, $subject, $start, $end, $need_upload, $annex, $remarks)
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
        $result = $this->db->myExecute($sql, $values);
        return $result;
    }

    function updateWork($id, $name, $subject, $start, $end, $need_upload, $annex, $remarks)
    {
        $sql = "UPDATE yeek.upwork_work SET name =:name,subject=:subject,start=:start,end=:end,
                            need_upload=:need_upload,annex=:annex,remarks=:remarks WHERE id = :id";
        $values = [
            'id' => $id,
            'name' => $name,
            'subject' => $subject,
            'start' => $start,
            'end' => $end,
            'need_upload' => $need_upload,
            'annex' => $annex,
            'remarks' => $remarks,
        ];
        $result = $this->db->myExecute($sql, $values);
        return $result;
    }


    function deleteWork($id)
    {
        $sql = "DELETE FROM yeek.upwork_work WHERE id=?";
        $result = $this->db->myExecute($sql, array($id));
        return $result;
    }

}




