<?php
if(!session_id()){
    exit("错误的打开方式");
}
include_once('../part/encoding.php');
if (isset($_SESSION['subject'])) {
    $subject = $_SESSION['subject'];
} else {
    $subject = "sql";
}
if (!file_exists('backup/')) {
    mkdir("backup/");
}
$fileDir = "file_" . $subject . "/";

if (isset($_POST['move_sub'])) {
    $oldFileName = "pack.zip";
    //backup_sql_0518.zip
    $newFileName = "backup_".$subject . "_" . $_POST['new_file_name'] . ".zip";
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
            echo " backup_$subject" . "_" . "$newFileName.zip";
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
            backup_<span><?php echo $subject?></span>_<input type="text" name="new_file_name" required="required">.zip<br>
            移动并删除源文件<input type="checkbox" name="move_and_delete" required="required"><br>
            <input type="submit" name="move_sub" value="移动">
        </label>
    </form>
</fieldset>