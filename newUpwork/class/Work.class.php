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
     * @param mixed $id
     * @param string $name
     * @param string $courseId
     * @param boolean $need_upload
     * @param string $start
     * @param string $end
     * @return array|null
     */
    function selectWorkInfo($id = "", $name = "", $courseId = "", $start = "", $end = "", $need_upload = true)
    {

        $sql = "SELECT a.*,b.name as subject FROM upwork_work a,upworkl_course b WHERE a.courseId=b.id";
        if (!empty($id)) {
            $sql .= " AND a.id = $id";
        }
        if (!empty($name)) {
            $sql .= " AND a.name LIKE '%$name%'";
        }
        if (!empty($courseId)) {
            $sql .= " AND a.courseId LIKE '%$courseId%'";
        }
        if (!empty($start)) {
            $sql .= " AND a.start>='$start'";
        }
        if (!empty($end)) {
            $sql .= " AND a.end>='$end'";
        }
        if ($need_upload) {
            $sql .= " AND a.need_upload=$need_upload";
        }
        $sql .= "  ORDER BY id ASC";
//        var_dump("当前查询语句：".$sql);
        $result = $this->db->myQuery($sql);
        return $result;
    }

    /**
     * @param string $name
     * @param string $courseId
     * @param string $start
     * @param string $end
     * @param boolean $need_upload
     * @param string $annex
     * @param string $remarks
     * @return int|null
     */
    function insertWork($name, $courseId, $start, $end, $need_upload, $annex, $remarks)
    {
        $sql = "INSERT INTO upwork_work (`name`, courseId, `start`, `end`, `annex`, `remarks`, `need_upload`) 
VALUES (:name, :courseId, :start, :end, :annex, :remarks, :need_upload);";
        if (empty($start)) {
            $start = null;
        }
        if (empty($end)) {
            $end = null;
        }
        $values = [
            'name' => $name,
            'courseId' => $courseId,
            'start' => $start,
            'end' => $end,
            'need_upload' => $need_upload,
            'annex' => $annex,
            'remarks' => $remarks,
        ];
        $result = $this->db->myExecute($sql, $values);
        return $result;
    }

    /**
     * @param mixed $id
     * @param string $name
     * @param string $courseId
     * @param string $start
     * @param string $end
     * @param boolean $need_upload
     * @param string $annex
     * @param string $remarks
     * @return int|null
     */
    function updateWork($id, $name, $courseId, $start, $end, $need_upload, $annex, $remarks)
    {
        $sql = "UPDATE yeek.upwork_work SET name =:name,courseId=:courseId,start=:start,end=:end,
                            need_upload=:need_upload,annex=:annex,remarks=:remarks WHERE id = :id";
        if (empty($start)) {
            $start = null;
        }
        if (empty($end)) {
            $end = null;
        }
        $values = [
            'id' => $id,
            'name' => $name,
            'courseId' => $courseId,
            'start' => $start,
            'end' => $end,
            'need_upload' => $need_upload,
            'annex' => $annex,
            'remarks' => $remarks,
        ];
        $result = $this->db->myExecute($sql, $values);
        return $result;
    }


    /**
     * @param string int
     * @return int|null
     */
    function deleteWork($id)
    {
        $sql = "DELETE FROM yeek.upwork_work WHERE id=?";
        $result = $this->db->myExecute($sql, array($id));
        return $result;
    }

    function getCourse()
    {
        $sql = "SELECT id,name FROM upworkl_course";
        $result = $this->db->myQuery($sql);
        return $result;
    }
}