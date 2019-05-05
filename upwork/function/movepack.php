<?php
if(!isset($in)){
    include_once ('../../part/encoding.php');
}
if (isset($_POST['move_sub'])) {
    $oldFileName = $_POST['old_file_name'];
    $newFileName = $_POST['new_file_name'];
    $oldFileName="file/$oldFileName"; //旧目录
    $newFileName="oldfile/$newFileName"; //新目录
    var_dump($oldFileName);
    var_dump($newFileName);
    if(file_exists($oldFileName)){
        if(rename($oldFileName,$newFileName)){
            echo "移动成功";
        }else{
            echo "移动失败";
        }
    }else{
        echo "被移动文件不存在";
    }
} ?>
<fieldset>
<form method="post">
    <label>
        被移动文件名<input type="text" name="old_file_name"><br>
        目的文件名<input type="text" name="new_file_name">
        <input type="submit" name="move_sub" value="移动">
    </label>
</form>
</fieldset>