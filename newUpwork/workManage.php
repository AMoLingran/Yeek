<?php
$rootDir = dirname(__FILE__) . "/";

//参见：https://www.php.net/manual/zh/function.spl-autoload-register.php
function my_autoloader($class)
{
    include 'class/' . $class . '.class.php';
}

spl_autoload_register('my_autoloader');

$db = new DBUtils();
$work = new Work($db);
$courseArray = $work->getCourse();

function getWorkInfo($id = "", $name = "", $subject = "", $start = "", $end = "", $need_upload = "")
{
    global $work;
    $workInfo = $work->selectWorkInfo($id, $name, $subject, $start, $end, $need_upload);
    return $workInfo;
}

$workInfo = getWorkInfo();
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
        @$_POST['insert_start'],
        @$_POST['insert_end'],
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>作业管理</title>
    <link rel="icon" href="logo.png" sizes="32x32">
    <script src="bootstrap/js/jquery.min.js"></script>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.js"></script>
</head>
<body>

<?php include_once $rootDir . "part/nav.php" ?>

<main style="margin: 3% 10% 0">
    <div class="container" id="manage">
        <div class=" card ">
            <div class="card-header ">
                <a class="card-link" data-toggle="collapse" href="#select_box">查询</a>
            </div>
            <div id="select_box" class="collapse" data-parent="#manage">
                <div class="card-body">
                    <form class="form-inline" action="workManage.php" id="select" method="post">

                        <label class="mr-3" for="select_id">id：
                        <input class="form-control" id="select_id" name="select_id" type="number">
                        </label>

                        <label class="mr-3" for="select_name">作业名：
                        <input class="form-control" id="select_name" name="select_name" type="text">
                        </label>

                        <label class="mr-3" for="select_subject">科目：
                        <select class="form-control" id="select_subject" name="select_subject">
                            <option value="">未选择</option>
                            <?php foreach ($courseArray as $cor_item): ?>
                                <option value="<?php echo $cor_item['id'] ?>">
                                    <?php echo $cor_item['name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        </label>

                        <label class="mr-3" for="select_start">开始
                        <input class="form-control" id="select_start" type="date" name="select_start">
                        </label>

                        <label class="mr-3" for="select_end"> 结束
                        <input class="form-control" id="select_end" type="date" name="select_end">
                        </label>

                        <label class="mr-3" for="select_need_upload">是否需要上交
                        <select class="form-control" id="select_need_upload" name="select_need_upload">
                            <option value="">未选择</option>
                            <option value="false">否</option>
                            <option value="true">是</option>
                        </select>
                        </label>

                        <input class="ml-2 btn btn-primary" id="select_submit" type="submit" name="select_submit" value="查询">
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <a class="card-link"  data-toggle="collapse" href="#insert_box">插入</a>
            </div>
            <div id="insert_box" class="collapse" data-parent="#manage">
                <div class="card-body">
                    <form class="form-inline" action="workManage.php" id="insert" method="post">

                        <label class="mr-3"  for="insert_name">作业名：</label>
                        <input class="form-control" id="insert_name" name="insert_name" type="text" required>

                        <label class="mr-3" for="insert_subject">科目：</label>
                        <select class="form-control" id="insert_subject" name="insert_subject" required>
                            <option value="">未选择</option>
                            <?php foreach ($courseArray as $cor_item): ?>
                                <option value="<?php echo $cor_item['id'] ?>">
                                    <?php echo $cor_item['name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                        <label class="mr-3" for="insert_start">开始日期</label>
                        <input class="form-control" id="insert_start" name="insert_start" type="date">

                        <label class="mr-3" for="insert_end">结束日期</label>
                        <input class="form-control" id="insert_end" name="insert_end" type="date">

                        <label class="mr-3" for="insert_need_upload">是否需要上交</label>
                        <select class="form-control" id="insert_need_upload" name="insert_need_upload" required>
                            <option value="">未选择</option>
                            <option value="false">否</option>
                            <option value="true">是</option>
                        </select>

                        <label class="mr-3" for="insert_annex">课件名</label>
                        <input class="form-control" id="insert_annex" name="insert_annex" type="text">

                        <label class="mr-3" for="insert_remarks">备注</label>
                        <textarea class="form-control" id="insert_remarks" name="insert_remarks" rows="1"
                                  cols="30"></textarea>

                        <input class="ml-3 btn  btn-primary" id="insert_submit" type="submit" name="insert_submit" value="插入">
                    </form>
                </div>
            </div>
        </div></div>
    <br>
    <br>
    <?php

    if (isset($_GET['delete_id'])) {
        echo "<span>游客账号没有U/D权</span><br><br>";
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
        echo "<span>游客账号没有U/D权</span><br><br>";
        echo "当前信息：<br><br>";
        $workInfo = getWorkInfo($_GET['update_id']);
    }
    if (isset($_POST['update_submit'])) {
        if ($work->updateWork(
                $_POST['update_id'],
                $_POST['update_name'],
                $_POST['update_subject'],
                @$_POST['update_start'],
                @$_POST['update_end'],
                $_POST['update_need_upload'],
                @$_POST['update_annex'],
                @$_POST['update_remarks']
            ) == 1) {
            echo "更新成功<br><br>";

            $workInfo = $work->selectWorkInfo($_POST['update_id'], null, null, null, null, null);

        } else {
            echo "更新失败";
        }
    }
    ?>

    <?php if (isset($workInfo)) : ?>
        <div class="container  table-responsive">
            <table class="table table-hover table-bordered text-center" >
                <thead>
                <tr>
                    <td>id</td>
                    <td>作业名</td>
                    <td>科目</td>
                    <td>开始日期</td>
                    <td>结束日期</td>
                    <td>课件</td>
                    <td>备注</td>
                    <td>需要上交</td>
                    <td>操作</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($workInfo as $work_item) : ?>
                    <tr >
                        <td><?php echo $work_item['id'] ?></td>
                        <td><?php echo $work_item['name'] ?></td>
                        <td><?php echo $work_item['subject'] ?></td>
                        <td><?php echo $work_item['start'] ?></td>
                        <td><?php echo $work_item['end'] ?></td>
                        <td><?php echo $work_item['annex'] ?></td>
                        <td><?php echo $work_item['remarks'] ?></td>
                        <td><?php if ($work_item['need_upload'] == '1') {
                                echo "需要";
                            }; ?></td>
                        <td><a href="?update_id=<?php echo $work_item[0] ?>">修改</a>
                            /
                            <a href="?delete_id=<?php echo $work_item[0] ?>">删除</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tbody>
            </table>
        </div>
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
                <input id="update_name" name="update_name" type="text" required
                       value="<?php echo $workInfo[0][1] ?>">

                <label for="update_subject">科目：</label>
                <select id="update_subject" name="update_subject" required>
                    <option value="">未选择</option>
                    <?php foreach ($courseArray as $cor_item): ?>
                        <option value="<?php echo $cor_item['id'] ?>"
                            <?php if ($workInfo[0]['courseId'] == $cor_item['id']) echo "selected"; ?>>
                            <?php echo $cor_item['name'] ?>
                        </option>
                    <?php endforeach; ?>

                </select>

                <label for="update_start">开始日期</label>
                <input id="update_start" name="update_start" type="date" value="<?php echo $workInfo[0][3] ?>">

                <label for="update_end">结束日期</label>
                <input id="update_end" name="update_end" type="date" value="<?php echo $workInfo[0][4] ?>">

                <br>

                <label for="update_need_upload">是否需要上交</label>
                <select id="update_need_upload" name="update_need_upload" required>
                    <option value="">未选择</option>
                    <option value="false" <?php if ($workInfo[0][7] == '0') echo "selected"; ?> >否
                    </option>
                    <option value="true" <?php if ($workInfo[0][7] == '1') echo "selected"; ?> >是
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
</main>
<?php include_once $rootDir . "part/footer.php" ?>
</body>
</html>

