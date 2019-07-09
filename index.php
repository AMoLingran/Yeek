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
    <title>一客</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="/logo.png" sizes="32x32">
    <link href="styles/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="styles/icon.css" type="text/css" rel="stylesheet">
    <script src="scripts/jquery.min.js"></script>
    <script src="scripts/bootstrap.min.js"></script>
</head>
<body>
<?php include_once $rootDir . "part/nav.php" ?>

<main>
    <div class="container text-center">

        <p class="display-1 mt-5 font-weight-light">一客</p>
        <h1 class="mb-5 font-weight-bold">
            <span class="text-primary">Y</span>
            <span class="text-danger">e</span>
            <span class="text-warning">e</span>
            <span class="text-success">k</span>
            <span class="text-secondary">.top</span>
        </h1>
        <br>
        <div class="col-lg-4 offset-lg-4 col-12">
            <button class="btn btn-info btn-block btn-lg " onclick="toZhcp()">综 合 测 评 计 算 器</button>

            <br> <br>     <button class="btn btn-primary btn-block btn-lg " onclick="toNew()">作 业 管 理</button>

            <br> <br>

            <button class="btn btn-secondary btn-block btn-lg font-weight-light" onclick="toOld()">缅 怀 曾 经</button>
        </div>
        <br> <br>


    </div>
</main>

<?php include_once $rootDir . "part/footer.php" ?>
<script>
    function toZhcp() {
        window.location.href = "zhcp.php";
    }
    function toNew() {
        window.location.href = "new";
    }

    function toOld() {
        window.location.href = "old1";
    }

</script>
</body>
</html>
