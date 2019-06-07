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
    $sql = "SELECT work.name,end,class.name as subName,class.callname FROM work,class WHERE work.subject=class.callname AND work.need_upload=1 AND work.id=:id";
    $pdoS = $pdo->prepare($sql);
    $exec = $pdoS->execute(array('id'=>$workId));
    if ($exec&$result = $pdoS->fetch()) {
        $work = [
            'name' => $result['name'],
            'end' => 'End on ' . date("m/d", strtotime($result['end'])),
            'subName' => $result['subName'],
            'callname' => $result['callname'],
            'file_dir'=>"file_".$result['callname']."_".date("md", strtotime($result['end'])),
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