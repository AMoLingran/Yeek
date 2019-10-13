<?php


class Work
{
    private $db;

    /**
     * WorkInfo constructor.
     * @param $db DBUtils
     */
    public function __construct($db)
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
     * @param string $annex
     * @param string $remarks
     * @return array|null
     */
    public function selectWorkInfo($id, $name, $courseId, $need_upload, $start, $end, $annex, $remarks)
    {
        $limit = true;
        $sql = "SELECT a.*,b.name as subject,b.call_name  FROM upwork_work a,upwork_course b WHERE a.courseId=b.id";
        if (!empty($id)) {
            $sql .= " AND a.id = $id";
            $limit = false;
        }
        if (!empty($name)) {
            $sql .= " AND a.name LIKE '%$name%'";
            $limit = false;
        }
        if (!empty($courseId)) {
            $sql .= " AND a.courseId LIKE '%$courseId%'";
            $limit = false;
        }
        if ($need_upload) {
            $sql .= " AND a.need_upload=$need_upload";
            $limit = false;
        }
        if (!empty($start)) {
            $sql .= " AND a.start>='$start'";
            $limit = false;
        }
        if (!empty($end)) {
            $sql .= " AND a.end<='$end'";
            $limit = false;
        }
        if (!empty($annex)) {
            $sql .= " AND a.annex LIKE '%$annex%'";
            $limit = false;
        }
        if (!empty($remarks)) {
            $sql .= " AND a.remarks LIKE '%$remarks%'";
            $limit = false;
        }

//        $sql .= "  ORDER BY id ASC";
        $sql .= "  ORDER BY id DESC";
        if ($limit) {
            $sql .= " LIMIT 15";
        }
//        var_dump("当前查询语句：".$sql);
        $result = $this->db->myQuery($sql);
        return $result;
    }


    /**
     * @param bool $upload
     * @return array|null
     */
    public function needDo($upload)
    {
        $date = date("Y-m-d");
        $sql = "SELECT a.*,b.name as subject,b.call_name  FROM upwork_work a,upwork_course b 
            WHERE a.courseId=b.id AND end>='$date' ";
        if ($upload) {
            $sql .=" AND need_upload='1'";
        }
        $sql .= " ORDER BY id DESC";
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
    public function insertWork($name, $courseId, $need_upload, $start, $end, $annex, $remarks)
    {
        $sql = 'INSERT INTO upwork_work (`name`, courseId, `start`, `end`, `annex`, `remarks`, need_upload) 
VALUES (:name, :courseId, :start, :end, :annex, :remarks, :need_upload);';
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
    public function updateWork($id, $name, $courseId, $need_upload, $start, $end, $annex, $remarks)
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
    public function deleteWork($id)
    {
        $sql = "DELETE FROM yeek.upwork_work WHERE id=?";
        $result = $this->db->myExecute($sql, array($id));
        return $result;
    }
}
