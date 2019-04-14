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

if (isset($_POST['zip'])) {
    system('zip -r file/pack.zip file');
} ?>
<form method="post">
    <input type="submit" name="zip" value="压缩">
</form>
