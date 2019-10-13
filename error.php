<?php

include_once "myHead.php";
$rootDir = dirname(__FILE__) . "/";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>一客</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="stylesheet" href="/source/css/bootstrap/bootstrap.min.css">
    <script src="/source/js/jquery.min.js"></script>
    <script src="/source/css/bootstrap/bootstrap.min.js"></script>
</head>

<body>
    <?php include_once $rootDir . "part/nav.php" ?>
    <button class=" btn"></button>
    <main class="container" style="margin-top: 3%">
        <div class="d-flex">
            <div class="h1">设置报错日志</div>
            <div class="ml-auto align-self-center"><a class="btn btn-outline-info" href="php_errors.log">错误日志</a></div>
        </div>
        <br>
        <p>在服务器中直接显示报错信息是很危险的，以为错误信息中包含了文件路径等敏感信息，所以将报错信息收集到一个日志文件就尤为重要了。</p>
        <br>
        <h3>1.修改php.ini</h3>
        <p>打开<code>/etc/php.ini</code>将相关属性设置为以下属性：</p>
        <div class="row">
            <div class="col-md-4">1. <code>error_reporting = E_ALL </code></div>
            <div class="col-md-6">
                <p>将会向PHP报告发生的每个错误</p>
            </div>

            <div class="col-md-4">2. <code>display_errors = Off </code></div>
            <div class="col-md-6">
                <p>不显示满足上条 指令所定义规则的所有错误报告</p>
            </div>

            <div class="col-md-4">3. <code>log_errors = On </code></div>
            <div class="col-md-6">
                <p>决定日志语句记录的位置</p>
            </div>

            <div class="col-md-4">4. <code>log_errors_max_len = 1024 </code></div>
            <div class="col-md-6">
                <p>设置每个日志项的最大长度</p>
            </div>

            <div class="col-md-4">5. <code>error_log = /var/php_error.log </code></div>
            <div class="col-md-6">
                <p>指定产生的 错误报告写入的日志文件位置</p>
            </div>
        </div>
        <br>

        <h3>2.重启服务</h3>
        <p>可以选择重启httpd(apache)<code> systemctl restart httpd.service </code>
            <mark>耗时短</mark>。
        </p>
        <p>或者之前重启整个服务器<code> reboot </code>
            <mark>耗时长</mark>。
        </p>
        <br>

        <h3>3.检查</h3>
        <p>重启之后进入phpinfo中查看开启情况。</p>
        <br>

        <h3>4.创建日志文件</h3>
        <p>需要自己创建<code>error_log</code>文件，php才会将错误信息写入日志（注意文件权限）。</p>
        <br>

        <h3>5.测试</h3>
        <p>可以在php代码中使用<code>throw new Exception("抛出一个自定义报错");</code>，再去error_log中查看报错信息。</p>



    </main>

    <?php include_once $rootDir . "part/footer.php" ?>

</body>

</html>


<?php

//throw new Exception("自定义报错了解一下？");
?>