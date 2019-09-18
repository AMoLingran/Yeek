<?php




?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php

if(isset($_GET['delete_id'])){
    echo "真的要删除下面这条码？<br><br>";
    $workInfo = getWorkInfo($_GET['delete_id']);

}
?>
<?php if (isset($workInfo)) : ?>
    <table>
        <tr>
            <td>id</td>
            <td>作业名</td>
            <td>科目</td>
            <td>开始日期</td>
            <td>结束日期</td>
            <td>课件</td>
            <td>备注</td>
            <td>需要上传</td>
            <td>操作</td>
        </tr>
        <?php foreach ($workInfo as $key => $item) : ?>
            <tr>
                <td><?php echo $item[0] ?></td>
                <td><?php echo $item[1] ?></td>
                <td><?php echo $item[2] ?></td>
                <td><?php echo $item[3] ?></td>
                <td><?php echo $item[4] ?></td>
                <td><?php echo $item[5] ?></td>
                <td><?php echo $item[6] ?></td>
                <td><?php if($item[7]==1){echo "需要";}; ?></td>
                <td><a href=""> 修改 </a> / <a href="?delete_id=<?php echo $item[0] ?>"> 删除 </a></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>
<?php if(isset($_GET['delete_id'])):?>
    <br><br>
    <form method="post">
        <input type="hidden" name="delete_id" value="<?php echo $_GET['delete_id']; ?>">
        <input type="submit" name="delete_ok" value="确定删除id=<?php echo $_GET['delete_id']; ?>的记录">
    </form>
<?php endif;?>



</body>
</html>
