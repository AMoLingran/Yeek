<?php
/**
 * Created by PhpStorm.
 * User: MoLingran
 * Date: 3/16 0016
 * Time: 16:06
 */

$domain = $_SERVER['HTTP_HOST'];
date_default_timezone_set('PRC');
function dCoding($in_charset)
{
    if (PATH_SEPARATOR == ':') {
        return $in_charset;
    } else {
        return iconv('UTF-8', 'GBK', $in_charset);
    }
}
$error = '未知错误';
function delete()
{
    global $error;
    $old = "file/" . dCoding($_POST['name']);
    $new = "delete/" . dCoding($_POST['name']);
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
        $error = "回收站中已存在";
        return false;
    }
}
?>
<fieldset>
    <legend>删除 <span><?php echo $domain ?></span> 的文件</legend>
    <form method="post" name="checkForm">
        文件名
        <label>
            <input type="text" name="name" required="required"/>
            <input type="submit" name="delete" value="删除"/>
        </label>
        <br>
        <p>删除只是将文件移入delete文件夹（网页不可见）</p>
    </form>
    <br>
    <?php if (isset($_POST['delete'])) {
        if (delete()) {
            echo '<p><span>成功</span>删除' . $_POST['name'] . '文件</p>';
        } else {
            echo '<p>删除<span>失败</span>“' . $error . $_POST['name'] . '”</p>';
        }
    } ?>
</fieldset>