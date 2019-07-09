<?php
/**
 * Created by PhpStorm.
 * User: MoLingran
 * Date: 3/17 0017
 * Time: 16:18
 */


include_once "myHead.php";
$rootDir = dirname(__FILE__) . "/";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>综合测评计算器</title>
    <link rel="icon" href="/logo.png" sizes="32x32">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="styles/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="styles/icon.css" type="text/css" rel="stylesheet">
    <script src="scripts/jquery.min.js"></script>
    <script src="scripts/bootstrap.min.js"></script>
</head>
<body>
<?php include_once $rootDir . "part/nav.php" ?>
<main class="container" style="margin-top:2%">
    <h3 class="">个人综合测评计算器</h3>
    <p class="ml-3">不可编辑的为未完善的功能</p>
    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center " style="min-width: 992px">
            <thead>
            <tr class="row m-0">
                <td class="col-1">项目</td>
                <td class="col-1">表现分</td>
                <td class="col-3"><span class="text-secondary">加分项目</span></td>
                <td class="col-1">本人加分数</td>
                <td class="col-1"><span class="text-secondary">本人奖励分</span></td>
                <td class="col-2"><span class="text-secondary">扣分项目</span></td>
                <td class="col-1">扣分总数</td>
                <td class="col-1">所得总分</td>
                <td class="col-1"><span class="text-secondary">备注</span></td>
            </tr>
            </thead>
            <tbody>
            <tr key="0" class="row m-0">
                <td class="col-1">思想素质综合测评（A）</td>
                <td data-name="base" class="col-1" contenteditable='true'></td>
                <td data-name="add_item" class="col-3"></td>
                <td data-name="add_sum" class="col-1" contenteditable='true'></td>
                <td data-name="weighted" class="col-1"></td>
                <td data-name="del_item" class="col-2"></td>
                <td data-name="del_sum" class="col-1" contenteditable='true'></td>
                <td data-name="sum" class="col-1"></td>
                <td data-name="remarks" class="col-1"></td>
            </tr>
            <tr key="1" class="row m-0">
                <td class="col-1">专业知识技能测评（B）</td>
                <td data-name="base" class="col-1" contenteditable='true'></td>
                <td data-name="add_item" class="col-3"></td>
                <td data-name="add_sum" class="col-1" contenteditable='true'></td>
                <td data-name="weighted" class="col-1"></td>
                <td data-name="del_item" class="col-2"></td>
                <td data-name="del_sum" class="col-1" contenteditable='true'></td>
                <td data-name="sum" class="col-1"></td>
                <td data-name="remarks" class="col-1"></td>
            </tr>
            <tr key="2" class="row m-0">
                <td class="col-1">文体素质测评（C）</td>
                <td data-name="base" class="col-1" contenteditable='true'></td>
                <td data-name="add_item" class="col-3"></td>
                <td data-name="add_sum" class="col-1" contenteditable='true'></td>
                <td data-name="weighted" class="col-1"></td>
                <td data-name="del_item" class="col-2"></td>
                <td data-name="del_sum" class="col-1" contenteditable='true'></td>
                <td data-name="sum" class="col-1"></td>
                <td data-name="remarks" class="col-1"></td>
            </tr>
            <tr key="3" class="row m-0">
                <td class="col-1">社会实践素质测评（D）</td>
                <td data-name="base" class="col-1" contenteditable='true'></td>
                <td data-name="add_item" class="col-3"></td>
                <td data-name="add_sum" class="col-1" contenteditable='true'></td>
                <td data-name="weighted" class="col-1"></td>
                <td data-name="del_item" class="col-2"></td>
                <td data-name="del_sum" class="col-1" contenteditable='true'></td>
                <td data-name="sum" class="col-1"></td>
                <td data-name="remarks" class="col-1"></td>
            </tr>
            </tbody>
        </table>
    </div>
    <p>总分（已省略）：<span id="zf"></span></p>
    <button class="btn btn-primary ml-auto" onclick="resetDate()">重置</button>

    <div>
        <h1 class="mt-5">须知 <small>Readme</small></h1>
        <p>目前这个是个人制作的 <span class="text-info">gdmec-学生综合素质测评表个人综合素质
                测评加减分项目细化表的</span> 分数计算器 ，数据<span class="text-danger">仅供参考</span></p>
        <p>主要是想让综合评测变得方便简单</p>
        <p>表格可直接编辑，数据保存在本地浏览器</p>

        <br>
        <h4>未来兴许会加入以下功能：</h4>
        <ul>
            <li>登录教务处自动获取并计算B、C项的基本分</li>
            <li>可选择加减分项目</li>
            <li>数据保存到云端，与一客账号（学号）绑定</li>
        </ul>
        <p>不过本人7月应该都是没空的（咕咕咕咕）</p>

        <p>如果你喜欢这个计算器或者想鼓励我继续开发的话，请到我的
            <a href="https://gitee.com/Moreant/Yeek/tree/dev/">码云</a>
            /
            <a href="https://github.com/Moreant/Yeek/tree/dev/">github</a>
            里给我的网站点个star支持一下。 （里含源码）</p>
    </div>
</main>


<?php include_once $rootDir . "part/footer.php" ?>


<script src="scripts/zhcp.js">
</script>
</body>
</html>
