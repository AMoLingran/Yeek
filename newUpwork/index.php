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
    <!--    <script src="bootstrap/js/jquery.min.js"></script>-->
    <!--    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">-->
    <!--    <script src="bootstrap/js/bootstrap.js"></script>-->
    <link href="bootstrap/css/bootstrap.css" media="all" rel="stylesheet" type="text/css">
    <link href="bootstrap/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/fileinput.js" type="text/javascript"></script>
    <script src="bootstrap/js/zh.js" type="text/javascript"></script>
    <script>


        $(document).ready(function () {
            $("nav").load("part/nav.php");
            $("footer").load("part/footer.php");
            $(".nav-link").click(function (event) {
                event.preventDefault();
            });

        });

        function getWorkInfo(id) {

            $.post("function/workVM.php", {
                    workId: id
                },
                function (data) //回传函数
                {
                    var parsedJson = jQuery.parseJSON(data);
                    // alert(parsedJson.name+"\n"+parsedJson.end);
                    $("#workName").text(parsedJson.name);
                    $("#endTime").text(parsedJson.end);
                    $("#workSubject").text(parsedJson.subject);
                }
            );
        }

    </script>
</head>
<body>
<!---->
<?php //include_once $rootDir . "part/nav.php"; ?>

<nav></nav>
<div class=" container" style="margin-bottom: 20%">
    <div class=" row">
        <div class="col-sm-2">
            <div class="card">
                <div class="card-header">
                    <p class="h4 text-center">需交列表</p>
                </div>
                <ul class="nav nav-pills" role="tablist">
                    <?php foreach ($result as $item): ?>
                        <li class="nav-item m-3">
                            <a class="nav-link" data-toggle="pill" href=""
                               onclick="getWorkInfo( <?php echo $item['id'] ?>)">
                                <?php echo "[" . $item['subject'] . "] - " . $item['name'] ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="col-sm-10  bg-light text-dark">
            <div style="margin-top: 5%;margin-left: 5%">
                <h5 id="workSubject">科目</h5>
                <p id="workName" class="display-3">作业名</p>
                <h4 class="mb-5">截至时间:<span id="endTime"></span></h4>


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
    <p align="center"><a href="https://gitee.com/Moreant/Yeek/tree/newUpwork/newUpwork">项目地址：</a></p>

    <footer></footer>


    <script>
        //上传文件框初始化
            $('#file').fileinput({
            theme: 'fas',
            language: 'zh',
            uploadUrl: 'file/receive.php?fileUrl=file02',
            uploadAsync: true, //默认异步上传
            // showUpload: false, //是否显示上传按钮
            // showRemove: false, //显示移除按钮
            allowedFileExtensions: ['txt', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx', 'zip'],
            showPreview: false, //是否显示预览
            showCaption: true,//是否显示标题
            enctype: 'multipart/form-data',
            browseClass: "btn btn-primary", //按钮样式
        }).on("fileuploaded", function (event, data, previewId, index) {
            var result = "上传成功";
            switch (data.response) {
                case 1:
                    result = "上传成功";
                    break;
                case -2:
                    result = "文件已存在";
                    break;
                case -1:
                    result = "未知错误";
                    break;
            }
            alert(result);
            $("#result").text(result);
        });

    </script>
</body>
</html>
