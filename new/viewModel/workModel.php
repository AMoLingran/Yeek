<?php
include_once "../myHead.php";


$db = new DBUtils();
$work = new Work($db);

if (isset($_POST['flag'])) {
    switch ($_POST['flag']) {
        case "subject":
            echo subject($db);
            break;
        case "needDo":
            echo needDo($work,@$_POST['upload']);
            break;
        case "query":
            echo query(
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
            exit();
            break;
        case "insert":
            echo insert(
                $work,
                $_POST['name'],
                $_POST['subject'],
                $_POST['upload'],
                @$_POST['start'],
                @$_POST['end'],
                @$_POST['annex'],
                @$_POST['remarks']
            );
            exit();
            break;
        case "del":
            del(
                $work,
                $_POST['id']
            );
            break;
        case "update":
            echo update(
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
            exit();
            break;
        default:
            break;
    }
}


/**
 * @param Work $work
 * @return false|string
 */
function update($work, $id, $name = "", $courseId = "", $upload = "", $start = "", $end = "", $annex = "", $remarks = "")
{
    $result = $work->updateWork($id, $name, $courseId, $upload, $start, $end, $annex, $remarks);
    return json_encode(array('code' => $result));
}


/**
 * @param Work $work
 * @return false|string
 */
function del($work, $id)
{
    $result = $work->deleteWork($id);
    return json_encode(array('code' => $result));

}


/**
 * @param Work $work
 * @return false|string
 */
function insert($work, $name, $courseId, $upload, $start, $end, $annex, $remarks)
{
    $result = $work->insertWork($name, $courseId, $upload, $start, $end, $annex, $remarks);
    return json_encode(array('code' => $result));

}

/**
 * @param Work $work
 * @return false|string
 */
function query($work, $id, $name, $courseId, $upload, $start, $end, $annex, $remarks)
{
    $result = $work->selectWorkInfo($id, $name, $courseId, $upload, $start, $end, $annex, $remarks);
    return json_encode($result);
}


/**
 * @param Work $work
 * @param bool $upload
 * @return false|string
 */
function needDo($work, $upload)
{

    $result = $work->needDo($upload);
    return json_encode($result);
}


/**
 * @param DBUtils $db
 * @return false|string
 */
function subject($db)
{
    $query = $db->myQuery("SELECT a.name,a.id FROM upwork_course a");
    return json_encode($query);
}


