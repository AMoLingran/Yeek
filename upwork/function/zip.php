<?php
if (!session_id()) {
    session_start();
    if (!isset($_SESSION['login'])) {
        function toLogin()
        {
            $fromFile = substr($_SERVER['PHP_SELF'], strpos($_SERVER['PHP_SELF'], '/', 1) + 1);
            $head = "";
            for ($int = substr_count($fromFile, '/'); $int > 0; $int--) {
                $head = $head . '../';
            }
            var_dump($head);
            header("location:" . $head . "login.php?hint=unLogged&fromFile=$fromFile");
        }

        toLogin();
    }
}
$disabled = "";
if (!isset($subject)) {
    if (isset($lastDir)) {
        $zipDir = $lastDir;
    } else {
        exit("错误的打开方式");
    }

} else {
    $zipDir = "file_$subject";
}

$zipValue="压缩 $zipDir 的文件";
$zipName = $zipDir.date("md");

if (isset($_POST['zip_sub'])) {
    system("zip -r $zipDir/pack.zip $zipDir");
} ?>
<form method="post">
    <input type="submit" name="zip_sub" value="<?php echo strtoupper($zipValue) ?>"/>
</form>
