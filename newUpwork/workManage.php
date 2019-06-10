<?php
$rootDir = dirname(__FILE__) . "/";

//参见：https://www.php.net/manual/zh/function.spl-autoload-register.php
function my_autoloader($class)
{
    include 'class/' . $class . '.class.php';
}

spl_autoload_register('my_autoloader');

$db = new DBUtils(
    "mysql",
    "yeek.top",
    "yeek",
    "utf8",
    "moreant",
    "moreant"
);
$work = new Work($db);

function getWorkInfo($id = "", $name = "", $subject = "", $start = "", $end = "", $need_upload = "")
{
    global $work;
    $workInfo = $work->selectWorkInfo($id, $name, $subject, $start, $end, $need_upload);
    return $workInfo;
}

if (isset($_POST['select_submit'])) {
    $workInfo = getWorkInfo(
        @$_POST['select_id'],
        @$_POST['select_name'],
        @$_POST['select_subject'],
        @$_POST['select_start'],
        @$_POST['select_end'],
        @$_POST['select_need_upload']
    );

}

if (isset($_POST['insert_submit'])) {
    var_dump($work->insertWork(
        $_POST['insert_name'],
        $_POST['insert_subject'],
        $_POST['insert_start'],
        $_POST['insert_end'],
        $_POST['insert_need_upload'],
        @$_POST['insert_annex'],
        @$_POST['insert_remarks']
    ));
    $workInfo = $work->selectWorkInfo("(select max(id) from upwork_work )");
}


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>作业管理</title>
    <link href="default.css" type="text/css" rel="stylesheet">
    <style>
        body {
            margin: 3% 10%;
        }

        fieldset {
            padding: 30px;
        }
    </style>
</head>
<body>
<fieldset>
    <legend>查询：</legend>
    <form action="workManage.php" id="select" method="post">

        <label for="select_id">id：</label>
        <input id="select_id" name="select_id" type="number">

        <label for="select_name">作业名：</label>
        <input id="select_name" name="select_name" type="text">

        <label for="select_subject">科目：</label>
        <select id="select_subject" name="select_subject">
            <option value="">未选择</option>
            <option value="SQL Server">SQL Server</option>
            <option value="Android">Android</option>
        </select>

        <label for="select_start">开始</label>
        <input id="select_start" type="date" name="select_start">

        <label for="select_end"> 结束</label>
        <input id="select_end" type="date" name="select_end">

        <label for="select_need_upload">是否需要上交 </label>
        <select id="select_need_upload" name="select_need_upload">
            <option value="">未选择</option>
            <option value="true">是</option>
            <option value="false">否</option>
        </select>

        <input id="select_submit" type="submit" name="select_submit" value="查询">
    </form>


</fieldset>

<br>
<br>
<fieldset>
    <legend>插入：</legend>
    <form action="workManage.php" id="insert" method="post">

        <label for="insert_name">作业名：</label>
        <input id="insert_name" name="insert_name" type="text" required>

        <label for="insert_subject">科目：</label>
        <select id="insert_subject" name="insert_subject" required>
            <option value="">未选择</option>
            <option value="SQL Server">SQL Server</option>
            <option value="Android">Android</option>
        </select>

        <label for="insert_start">开始日期</label>
        <input id="insert_start" name="insert_start" type="date" required>

        <label for="insert_end">结束日期</label>
        <input id="insert_end" name="insert_end" type="date" required>

        <br>

        <label for="insert_need_upload">是否需要上交</label>
        <select id="insert_need_upload" name="insert_need_upload" required>
            <option value="">未选择</option>
            <option value="true">是</option>
            <option value="false">否</option>
        </select>

        <label for="insert_annex">课件名</label>
        <input id="insert_annex" name="insert_annex" type="text">

        <label for="insert_remarks">备注</label>
        <textarea id="insert_remarks" name="insert_remarks" rows="1" cols="30"></textarea>

        <input id="insert_submit" type="submit" name="insert_submit" value="插入">
    </form>
</fieldset>

<br>
<br>
<?php

if (isset($_GET['delete_id'])) {
    echo "真的要删除下面这条码？<br><br>";
    $workInfo = getWorkInfo($_GET['delete_id']);
}
if (isset($_POST['delete_submit'])) {
    if ($work->deleteWork($_POST['delete_id']) == 1) {
        echo "删除成功<br><br>";
    } else {
        echo "删除失败";
    }
}

if (isset($_GET['update_id'])) {
    echo "当前信息：<br><br>";
    $workInfo = getWorkInfo($_GET['update_id']);
}
if (isset($_POST['update_submit'])) {
    if ($work->updateWork(
            $_POST['update_id'],
            $_POST['update_name'],
            $_POST['update_subject'],
            $_POST['update_start'],
            $_POST['update_end'],
            $_POST['update_need_upload'],
            @$_POST['update_annex'],
            @$_POST['update_remarks']
        ) == 1) {
        echo "更新成功<br><br>";

       $workInfo= $work->selectWorkInfo( $_POST['update_id'],null,null,null,null,null);

    } else {
        echo "更新失败";
    }
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
                <td><?php if ($item[7] == '1') {
                        echo "需要";
                    }; ?></td>
                <td><a href="?update_id=<?php echo $item[0] ?>">修改</a>
                    /
                    <a href="?delete_id=<?php echo $item[0] ?>">删除</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>




<?php if (isset($_GET['delete_id'])): ?>
    <br>
    <br>
    <form action="workManage.php" method="post">
        <input type="hidden" name="delete_id" value="<?php echo $_GET['delete_id']; ?>">
        <input type="submit" name="delete_submit" value="确定删除id=<?php echo $_GET['delete_id']; ?>的记录">
    </form>
<?php endif; ?>

<?php if (isset($_GET['update_id'])): ?>
    <br>
    <br>
    <fieldset>
        <legend>更新：</legend>
        <form action="workManage.php" id="update" method="post">

            <label for="update_name">作业名：</label>
            <input id="update_name" name="update_name" type="text" required value="<?php echo $workInfo[0][1] ?>">

            <label for="update_subject">科目：</label>
            <select id="update_subject" name="update_subject" required>
                <option value="">未选择</option>
                <option value="SQL Server" <?php if ($workInfo[0][2] === 'SQL Server') echo "selected"; ?> >SQL Server
                </option>
                <option value="Android" <?php if ($workInfo[0][2] === 'Android') echo "selected"; ?> >Android
                </option>
            </select>

            <label for="update_start">开始日期</label>
            <input id="update_start" name="update_start" type="date" required value="<?php echo $workInfo[0][3] ?>">

            <label for="update_end">结束日期</label>
            <input id="update_end" name="update_end" type="date" required value="<?php echo $workInfo[0][4] ?>">

            <br>

            <label for="update_need_upload">是否需要上交</label>
            <select id="update_need_upload" name="update_need_upload" required>
                <option value="">未选择</option>
                <option value="true" <?php if ($workInfo[0][7] === '1') echo "selected"; ?> >是
                </option>
                <option value="false" <?php if ($workInfo[0][7] === '0') echo "selected"; ?> >否
                </option>
            </select>

            <label for="update_annex">课件名</label>
            <input id="update_annex" name="update_annex" type="text" value="<?php echo $workInfo[0][5] ?>">

            <label for="update_remarks">备注</label>
            <textarea id="update_remarks" name="update_remarks" rows="1"
                      cols="30"><?php echo $workInfo[0][6] ?></textarea>

            <input type="hidden" name="update_id" value="<?php echo $_GET['update_id']; ?>">
            <input id="update_submit" type="submit" name="update_submit" value="更新">
        </form>
    </fieldset>
<?php endif; ?>
</body>
</html>

