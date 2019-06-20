<?php
$rootDir = dirname(__FILE__) . "/";

//参见：https://www.php.net/manual/zh/function.spl-autoload-register.php
function my_autoloader($class)
{
    include 'class/' . $class . '.class.php';
}

spl_autoload_register('my_autoloader');
$db = new DBUtils();


$result = $db->myQuery("SELECT a.name,a.id,b.name AS 'subject' FROM upwork_work a,upworkl_course b WHERE a.courseId=b.id AND need_upload=1");

?>


<!doctype html>
<html lang="en">
<head>
    <title>作业上传</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="logo.png" sizes="32x32">

    <link href="bootstrap/css/bootstrap.css" media="all" rel="stylesheet" type="text/css">
    <link href="bootstrap/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/fileinput.js" type="text/javascript"></script>
    <script src="bootstrap/js/zh.js" type="text/javascript"></script>
</head>
<body>
<!---->
<?php //include_once $rootDir . "part/nav.php"; ?>

<nav></nav>
<div class=" container" style="margin-bottom: 20%">
    <div class="text-center h3 mb-5"><a href="../new">点击进入传说中的模板</a></div>
    <div class=" row">

        <div class="col-sm-3">
            <div class="card">
                <div class="card-header">
                    <p class="h4 text-center">需交列表</p>
                </div>
                <ul class="nav nav-pills" role="tablist">
                    <?php $i = 1;
                    foreach ($result as $item): ?>
                        <li class="nav-item m-3">
                            <a class="nav-link" data-toggle="pill" href="#"
                               onclick="getWorkInfo( <?php echo $item['id'] ?>)">
                                <?php echo "[" . $item['subject'] . "] - " . $item['name'] ?>
                            </a>
                        </li>
                        <?php $i++; endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="col-sm-9  bg-light text-dark">
            <div id="info_box" style="margin-top: 5%;margin-left: 5%">
                <h5 id="workSubject"></h5>
                <p id="workName" class="display-3"></p>
                <h4 class="mb-5"><span id="endTime"></span></h4>


                <div class="col-sm-10">
                    <div style="margin-top: 5%">
                        <input id="file" name="file" type="file" data-theme="fas">
                        <p>仅支持 txt,doc,docx,ppt,pptx,xls,xlsx,zip 后缀的文件</p>
                    </div>
                    <div>
                        <p id="result" class="mt-1 h5"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <br>
    <div class="text-center mt-5 mb-5">
        <a href="workManage.php" class="btn btn-info btn-lg" role="button">作业管理</a>
        <a href="login.php" class="btn btn-primary btn-lg" role="button">登录</a>
        <a href="test.php" class="btn btn-danger btn-lg" role="button">测试</a>
    </div>
    <br>
    <p class="text-center"><a href="https://gitee.com/Moreant/Yeek/tree/newUpwork/newUpwork">项目地址：</a></p>

    <footer></footer>


    <script>
        let file_dir;
        $(document).ready(function () {
            $("nav").load("part/nav.php");
            $("footer").load("part/footer.php");
            // 阻止导航栏转跳

            //设置第一个为选中
            $("li a").first().attr("class", "active nav-link");

            //代开就默认选择第一个
            getWorkInfo(<?php echo $result[0]['id']?>);
        });

        function getWorkInfo(id) {

            // $("#info_box").show();
            $.post("function/workInfo.php",
                {
                    workId: id
                },
                function (data) //回传函数
                {
                    let info = jQuery.parseJSON(data);
                    // alert(parsedJson.name+"\n"+parsedJson.end);
                    $("#workName").text(info.name);
                    $("#endTime").text("截至时间:" + info.end);
                    $("#workSubject").text(info.subject);
                    $("#result").text("");
                    file_dir = "file_" + info.call_name + "_" + id;
                    //每次选择都刷新文件上传框
                    $('#file').fileinput('refresh', {uploadExtraData: {'dir': file_dir,}}).fileinput('clear');

                }
            );

        }


        //上传文件框初始化
        $('#file').fileinput({
            theme: 'fas',
            language: 'zh',
            uploadUrl: 'file/receive.php',

            uploadAsync: true, //默认异步上传
            // showUpload: false, //是否显示上传按钮
            // showRemove: false, //显示移除按钮
            allowedFileExtensions: ['txt', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx', 'zip', 'jpg'],
            showPreview: false, //是否显示预览
            showCaption: true,//是否显示标题
            enctype: 'multipart/form-data',
            browseClass: "btn btn-primary", //按钮样式
        }).on("filepreajax", function () {
            $("#result").text("文件上传中。。。");
        }).on("fileuploaded", function (event, data, previewId, index) {
            $("#result").text(data.response.request);
        });


    </script>
</body>
</html>
