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
    <script src="scripts/jquery.min.js"></script>
    <script src="scripts/bootstrap.min.js"></script>
</head>
<body>
<?php include_once $rootDir . "part/nav.php" ?>

<main>
    <div class="container text-center">

        <p class="display-1 mt-5">一客</p>
        <h1 class="mb-5">Yeek.top</h1>
        <br>
        <div class="col-lg-4 offset-lg-4 col-12">
            <button class="btn btn-primary btn-block btn-lg" onclick="toNew()"> 进 入 作 业 管 理</button>

            <br> <br> <br> <br>

            <button class="btn btn-info btn-block btn-lg" onclick="toOld()"> 缅 怀 曾 经</button>

        </div>
    </div>
</main>

<?php include_once $rootDir . "part/footer.php" ?>
<script>
    function toNew() {
        window.location.href="new";
    }

    function toOld() {
        window.location.href="old1";
    }

</script>
</body>
</html>
