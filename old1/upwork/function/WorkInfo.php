<?php
if (!session_id()) {
    session_start();
}

$workId = 0;
if (isset($_REQUEST['workId'])) {
    $_SESSION['workId'] = $_REQUEST['workId'];
}
if (isset($_SESSION['workId'])) {
    $workId = $_SESSION['workId'];
}

/**
 * @param $pdo PDO
 * @param $workId int
 * @return array|null
 */
function getWorkInfo($pdo, $workId)
{
    $sql = "SELECT upwork_work.name,end,upworkl_course.name as subName,upworkl_course.call_name FROM upwork_work,upworkl_course WHERE upwork_work.courseId=upworkl_course.id AND need_upload=1 AND upworkl_course.id=1";
    $pdoS = $pdo->prepare($sql);
    $exec = $pdoS->execute(array('id'=>$workId));
    if ($exec&$result = $pdoS->fetch()) {
        $work = [
            'name' => $result['name'],
            'end' => 'End on ' . date("m/d", strtotime($result['end'])),
            'subName' => $result['subName'],
            'call_name' => $result['call_name'],
        ];
        return $work;
    } else {
            $work = [
                'name' => "",
                'end' => "",
                'subName' => "请选择科目",
                'callname' => "",
            ];
            return $work;
    }
}
$work = getWorkInfo($pdo, $workId);