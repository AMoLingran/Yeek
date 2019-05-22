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


if (!isset($subject)) {
    if (!isset($fileDir)) {
        exit("错误的打开方式");
    }
    $zipDir = ".";
} else {
    $zipDir = "file_$subject";
}

function dir_name($zipDir)
{
    $dir = $_SERVER['PHP_SELF'];
    $at2 = stripos($dir, "file_");
    $at = strrpos($dir, "/index.php");
    $dirName = substr($dir, $at2, $at - $at2);
    if (empty($dirName)) {
        return $zipDir;
    } else {
        return $dirName;
    }
}

$zipValue = "压缩 " . dir_name($zipDir) . " 的文件";
$zipName = $zipDir . "_" . date("md");
if (isset($_POST['zip_sub'])) {
    system("zip -r $zipDir/pack.zip $zipDir/");
}
?>
<form method="post">
    <input type="submit" name="zip_sub" value="<?php echo strtoupper($zipValue) ?>"/>
</form>
