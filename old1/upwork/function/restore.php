<?php
/**
 * Created by PhpStorm.
 * User: MoLingran
 * Date: 3/16 0016
 * Time: 16:06
 */

if(!function_exists('encoding')){
    include_once('../../part/encoding.php');
}
$domain = $_SERVER['HTTP_HOST'];
date_default_timezone_set('PRC');
$error = '未知错误';
function restore()
{
    global $error;
    $new = "file/" . encoding($_POST['name']);
    $old = "delete/" . encoding($_POST['name']);
    if (!file_exists($new)) {
        if (file_exists($old)) {
            if (rename($old, $new)) {
                return true;
            } else {
                return false;
            }
        } else {
            $error = "找不到文件";
            return false;
        }
    } else {
        $error = "文件目录中已存在";
        return false;
    }
}
?>
<fieldset>
    <legend>恢复 <span><?php echo $domain ?></span> 的文件</legend>
    <form method="post" name="checkForm">
        文件名
        <label>
            <input type="text" name="name" required="required"/>
            <input type="submit" name="restore" value="删除"/>
        </label>
        <br>
        <p>恢复只是将delete文件夹移入上传文件夹（网页不可见）</p>
    </form>
    <br>
    <?php if (isset($_POST['restore'])) {
        if (restore()) {
            echo '<p><span>成功</span>恢复' . $_POST['name'] . '文件</p>';
        } else {
            echo '<p>恢复<span>失败</span>“' . $error . $_POST['name'] . '”</p>';
        }
    } ?>
</fieldset>