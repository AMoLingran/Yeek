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
    <p id="status"></p>
    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center " style="min-width: 992px">
            <tbody>
            <tr class="row m-0">
                <td class="col-1">项目</td>
                <td class="col-1">表现分</td>
                <td class="col-3">加分项目
                    <div class="row mt-auto border-top">
                        <div class="col-9 border-right">
                            项目
                        </div>
                        <div class="col-3 ml-auto">
                            分数
                        </div>
                    </div>
                </td>
                <td class="col-1">本人加分数</td>
                <td class="col-1">本人奖励分</td>
                <td class="col-3">扣分项目</td>
                <td class="col-1">扣分总数</td>
                <td class="col-1">所得总分</td>
                <!--                <td class="col-1">备注</td>-->
            </tr>
            <tr>
            </tr>
            </tbody>
        </table>
    </div>
    <p>总分（已省略）：<span id="zf"></span></p>
    <button class="btn btn-primary ml-auto" onclick="resetDate()">重置</button>

    <p>启用奖励分</p>

    <div>
        <h1 class="mt-5">须知
            <small>Readme</small>
        </h1>
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


<script>

    var arr = [];

    var data;
    $(document).ready(function () {
        data = getData();
        initial();
    });


    function getData() {
        if (localStorage.mylist == undefined) {
            $.ajax({
                type : "post",
                url :  "viewModel/zhcpModel.php",
                data :  {
                    getArr: "",
                    class: "软件1809",
                },
                async : false,
                success : function (data) {
                    if (data === "[]") {
                        arr = [
                            {
                                "item": "思想素质综合测评（A）",
                                "base": "",
                                "addItem": [
                                    {
                                        "itemName": "",
                                        "itemNum": ""
                                    },
                                ],
                                "addSum": "",
                                "weighted": "",
                                "delItem": [
                                    {
                                        "itemName": "",
                                        "itemNum": ""
                                    }
                                ],
                                "delSum": "",
                                "itemSum": "",
                                "remarks": ""
                            },
                            {
                                "item": "专业知识技能测评（B）",
                                "base": "",
                                "addItem": [
                                    {
                                        "itemName": "",
                                        "itemNum": ""
                                    }
                                ],
                                "addSum": "",
                                "weighted": "",
                                "delItem": [
                                    {
                                        "itemName": "",
                                        "itemNum": ""
                                    }
                                ],
                                "delSum": "",
                                "itemSum": "",
                                "remarks": ""
                            },
                            {
                                "item": "文体素质测评（C）",
                                "base": "",
                                "addItem": [
                                    {
                                        "itemName": "",
                                        "itemNum": ""
                                    }
                                ],
                                "addSum": "",
                                "weighted": "",
                                "delItem": [
                                    {
                                        "itemName": "",
                                        "itemNum": ""
                                    }
                                ],
                                "delSum": "",
                                "itemSum": "",
                                "remarks": ""
                            },
                            {
                                "item": "社会实践素质·测评（D）",
                                "base": "",
                                "addItem": [
                                    {
                                        "itemName": "",
                                        "itemNum": ""
                                    },
                                    {
                                        "itemName": "",
                                        "itemNum": ""
                                    }
                                ],
                                "addSum": "",
                                "weighted": "",
                                "delItem": [
                                    {
                                        "itemName": "",
                                        "itemNum": ""
                                    }
                                ],
                                "delSum": "",
                                "itemSum": "",
                                "remarks": ""
                            },
                            {
                                "sum": ""

                            },
                        ];
                    } else {
                        arr = JSON.parse(data);
                    }
                }
            });

        } else {
            arr = JSON.parse(localStorage.mylist);
        }
        return arr;
    }


    //把数据存到本地存储，并且转换成字符串格式的JSON
    function saveData(data) {
        //  var data = getData();
        //  JSON.stringify(localStorage.tableList);
        localStorage.mylist = JSON.stringify(data);
        // $.post();
        $("#status").text("测试中，数据仅保存在本地。").addClass("text-danger");
    }


    function initial() {
        $.each(data, function (i, v) {
            if (i < 4) {
                $("<tr>").attr("item", i).html(
                    '<tr item="' + i + '" class="row m-0">\n' +
                    '                <td class="col-1">' + v.item + '</td>\n' +
                    '                <td data-name="base" class="col-1" contenteditable="true">' + v.base + '</td>\n' +
                    '                <td data-name="addItem" class="col-3">\n' +
                    '                    <div class="p-1">\n' +
                    // '                        <label class="row" key="0">\n' +
                    // '                            <textarea type="text" name="itemName" class="col-9 form-control"></textarea>\n' +
                    // '                            <input type="number" name="itemNum" class="col-3 form-control">\n' +
                    // '                        </label>\n' +
                    '                    </div>\n' +
                    '                    <div class="d-flex justify-content-sm-around">\n' +
                    '                        <button type="button" class="btn btn-sm btn-primary" >添加</button>' +
                    '                        <button type="button"  class="btn btn-sm btn-outline-danger">删除</button>' +
                    '                    </div>' +
                    '                </td>\n' +
                    '                <td data-name="addSum" class="col-1" contenteditable="true">' + v.addSum + '</td>\n' +
                    '                <td data-name="weighted" class="col-1" contenteditable="true">' + v.weighted + '</td>\n' +
                    '                <td data-name="delItem" class="col-3">' +
                    '                    <div class="p-1">\n' +
                    // '                        <label class="row" key="0">\n' +
                    // '                            <textarea type="text" name="itemName" class="col-9 form-control"></textarea>\n' +
                    // '                            <input type="number" name="itemNum" class="col-3 form-control">\n' +
                    // '                        </label>\n' +
                    '                    </div>\n' +
                    '                    <div class="d-flex justify-content-sm-around">\n' +
                    '                        <button type="button"  class="btn btn-sm btn-primary">添加</button>' +
                    '                        <button type="button"  class="btn btn-sm btn-outline-danger">删除</button>' +
                    '                    </div>' +
                    '                </td>\n' +
                    '                <td data-name="delSum" class="col-1" contenteditable="true">' + v.delSum + '</td>\n' +
                    '                <td data-name="itemSum" class="col-1">' + v.itemSum + '</td>\n' +
                    // '                <td data-name="remarks" class="col-1" contenteditable="true">' + v.remarks + '</td>\n' +
                    '            </tr>'
                ).insertBefore("tr:last");
            }
            showItem(i, "addItem");
            showItem(i, "delItem");
            // sum += Number(v.sum);
        });
        $("#zf").text(data[4]['sum']);
        // var sum = (data[0]['sum'] * 0.2) + (data[1]["sum"] * 0.6) + (data[2]["sum"] * 0.1) + (data[3]["sum"] * 0.1);
        // $("#zf").text(Math.round(sum * 10000) / 10000);
    }

    //添加加分项
    $('table').on('click', '.btn-primary', function () {
        var item = $(this).parent().parent().parent().attr("item");
        var dateName = $(this).parent().parent().attr("data-name");
        data[item][dateName].push({"itemName": "", "itemNum": ""});
        saveData(data);
        showItem(item, dateName);
    });

    //删除加分项
    $('table').on('click', '.btn-outline-danger', function () {
        var item = $(this).parent().parent().parent().attr("item");
        var dateName = $(this).parent().parent().attr("data-name");
        data[item][dateName].splice(-1, 1);
        saveData(data);
        showItem(item, dateName);

    });
    $('table').on('change', 'label *', function () {

        var td = $(this).parent().parent().parent();
        var item = td.parent().attr("item");
        var sumName = td.next().attr("data-name");
        var dateName = td.attr("data-name");
        var key = $(this).parent().attr("key");
        var name = $(this).attr("name");
        data[item][dateName][key][name] = $(this).val();

        var itemSum = 0;
        $.each(data[item][dateName], function (i, v) {
            itemSum += Number(v.itemNum);
        });
        td.next().text(itemSum);
        data[item][sumName] = itemSum;
        saveData(data);
        countSum(item);

    });

    $('table').on('blur', '[contenteditable="true"]', function () {
        var val = $(this).html();
        var name = $(this).attr('data-name');
        var item = $(this).parent().attr('item');
        data[item][name] = val;
        saveData(data);
        countSum(item);
    });

    function showItem(item, type) {
        var date = getData();
        var addItem = $("[item=" + item + "]").children("[data-name=" + type + "]").children("div .p-1");
        addItem.html("");
        $.each(date[item][type], function (k, v) {
            addItem.html(function (i, o) {
                    return o +
                        '<label class="row" key="' + k + '">\n' +
                        '    <textarea type="text" name="itemName" rows="1" class="col-9 form-control">' + v.itemName + '</textarea>\n' +
                        '    <input type="number" name="itemNum" class="col-3 form-control" value="' + v.itemNum + '">\n' +
                        '</label>\n'
                }
            )
        });
        countSum(item);
    }


    function countSum(item) {
        var itemSum = Number(data[item]["base"]) + Number(data[item]["addSum"]) - Number(data[item]["delSum"]);
        data[item]["itemSum"] = itemSum;
        $("[item=" + item + "]").children("[data-name=itemSum]").text(itemSum);
        var sum = (data[0]['itemSum'] * 0.2) + (data[1]["itemSum"] * 0.6) + (data[2]["itemSum"] * 0.1) + (data[3]["itemSum"] * 0.1);
        sum = Math.round(sum * 10000) / 10000;
        data[4]['sum'] = sum;
        $("#zf").text(sum);
        saveData(data);
    }

    function resetDate() {
        if (window.confirm("确认要重置吗?")) {
            localStorage.removeItem("mylist");
            window.location.reload();
        }
    }
</script>
</body>
</html>
