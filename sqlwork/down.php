<?php
/**
 * Created by PhpStorm.
 * User: MoLingran
 * Date: 3/16 0016
 * Time: 16:06
 */
$str = '';
$dir = 'file';
$pattern = '#file/#';
$counter = 0;
if (PATH_SEPARATOR == ':') {
    $str = implode(glob($dir . '/*'));
} else {
    $str = iconv('GBK', 'UTF-8', implode(glob($dir . '/*')));
}
$array = preg_split($pattern, $str, -1, PREG_SPLIT_NO_EMPTY);
$domain = $_SERVER['HTTP_HOST'];
?>
<fieldset>
    <legend>下载 <span><?php echo $domain ?></span> 的文件</legend>
    <table>
        <tr>
            <?php foreach ($array as $item) : $counter++; ?>
                <td><?php echo "<a href='file/$item'>$item"; ?></a></td>
                <?php if ($counter % 5 == 0) echo "<tr></tr>"; endforeach; ?>
        </tr>
    </table>
</fieldset>