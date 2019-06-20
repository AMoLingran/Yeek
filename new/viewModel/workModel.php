<?php
include_once "../myHead.php";


$db = new DBUtils();
$work = new Work($db);

if (isset($_POST['flag'])) {
    switch ($_POST['flag']) {
        case "subject":
            subject($db);
            break;
        case "query":
            query(
                $work,
                @$_POST['id'],
                @$_POST['name'],
                @$_POST['subject'],
                @$_POST['upload'],
                @$_POST['start'],
                @$_POST['end'],
                @$_POST['annex'],
                @$_POST['remarks']
            );
            break;
        case "insert":
            insert(
                $work,
                $_POST['name'],
                $_POST['subject'],
                $_POST['upload'],
                @$_POST['start'],
                @$_POST['end'],
                @$_POST['annex'],
                @$_POST['remarks']
            );
            break;
        case "del":
            del(
                $work,
                $_POST['id']
            );
            break;
        case "update":
            update(
                $work,
                $_POST['id'],
                $_POST['name'],
                $_POST['subject'],
                $_POST['upload'],
                @$_POST['start'],
                @$_POST['end'],
                @$_POST['annex'],
                @$_POST['remarks']
            );
            break;
        default:
            break;
    }
}


/**
 * @param Work $work
 */
function update($work, $id,$name = "", $courseId = "", $upload = "", $start = "", $end = "", $annex = "", $remarks = "")
{
    $result = $work->updateWork($id,$name, $courseId, $upload, $start, $end, $annex, $remarks);
    echo json_encode(array('code' => $result));
    exit();
}



/**
 * @param Work $work
 */
function del($work, $id)
{
    $result = $work->deleteWork($id);
    echo json_encode(array('code' => $result));
    exit();
}


/**
 * @param Work $work
 */
function insert($work, $name = "", $courseId = "", $upload = "", $start = "", $end = "", $annex = "", $remarks = "")
{
    $result = $work->insertWork($name, $courseId, $upload, $start, $end, $annex, $remarks);
    echo json_encode(array('code' => $result));
    exit();
}

/**
 * @param Work $work
 */
function query($work, $id = "", $name = "", $courseId = "", $upload = "", $start = "", $end = "", $annex = "", $remarks = "")
{
    $result = $work->selectWorkInfo($id, $name, $courseId, $upload, $start, $end, $annex, $remarks);

    echo json_encode($result);

    exit();
}

/**
 * @param DBUtils $db
 */
function subject($db)
{
    $subject = array();
    $query = $db->myQuery("SELECT a.name,a.id FROM upworkl_course a");
//    foreach ($query as $key => $item) {
//        $subject[$key]['id'] = $item['id'];
//        $subject[$key]['name'] = $item['name'];
//    }
    echo json_encode($query);
    exit();
}


