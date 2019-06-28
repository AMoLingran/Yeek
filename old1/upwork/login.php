<?php
if (!session_id()) {
    session_start();
}
if (isset($_GET['hint'])) {
    if ($_GET['hint'] === 'unLogged') {
        echo "请先登陆";
        if (isset($_GET['fromFile'])) {
            $_SESSION['fromFile'] = $_GET['fromFile'];
        }
    }
}
if (isset($_POST['login'])) {
    if ($_POST['password'] === '233') {
        $_SESSION['login'] = "login";
        echo '登陆成功';
        if (isset($_SESSION['fromFile'])) {
            echo "<br>三秒后回到原网页";
            echo "<br><a href=".$_SESSION['fromFile'].">立即转跳</a>";
            echo '<meta http-equiv="refresh" content="3; url=' . $_SESSION['fromFile'] . '"/>';
        }

    }
}
if (isset($_POST['logout'])) {
    unset($_SESSION['login']);
}
?>

<?php if (isset($_SESSION['login'])): ?>
    <form action="login.php" method="post">
        <label id="input">
            <input type="submit" name="logout" value="退出">
        </label>
    </form>
<?php else: ?>
    <form action="login.php" method="post">
        <label id="input">
            <input type="password" name="password">
            <input type="submit" name="login" value="登陆">
        </label>
    </form>
<?php endif; ?>
