<?php
include_once('../part/encoding.php');
if (isset($_GET['subject'])) {
    $subject = $_GET['subject'];
} else {
    $subject = "sql";
}
if (!file_exists('back_file/')) {
    mkdir("back_file/");
}
$fileDir = "file_" . $subject . "/";

if (isset($_POST['move_sub'])) {
    $oldFileName = "pack.zip";
    $newFileName = $subject . "_" . $_POST['new_file_name'] . ".zip";
    $oldFileName = "$fileDir/$oldFileName"; //旧目录
    $newFileName = "back_file/$newFileName"; //新目录
    if (file_exists($oldFileName)) {
        if (!file_exists($newFileName)) {
            if (rename($oldFileName, $newFileName)) {
                echo "移动成功";
            } else {
                echo "移动失败";
            }
        } else {
            echo " back_file_$subject" . "_" . "$newFileName.zip";
        }
    } else {
        echo "被移动文件不存在";
    }
}
if (isset($_POST['move_and_delete'])) {
    $dh = opendir($fileDir);
    while ($file = readdir($dh)) {
        if ($file != "." && $file != "..") {
            $fullpath = $fileDir . "/" . $file;
            unlink($fullpath);
        }
    }
}
?>
<fieldset>
    <form method="post">
        <label>
            back_file_<input type="text" name="new_file_name" required="required">.zip<br>
            移动并删除源文件<input type="checkbox" name="move_and_delete" required="required"><br>
            <input type="submit" name="move_sub" value="移动">
        </label>
    </form>
</fieldset>