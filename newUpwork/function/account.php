<?php
if(!isset($_SESSION)){
    session_start();
}
$rootDir = dirname(__FILE__) . "/";

//参见：https://www.php.net/manual/zh/function.spl-autoload-register.php
function my_autoloader($class)
{
    include '../class/' . $class . '.class.php';
}

spl_autoload_register('my_autoloader');

$db = new DBUtilsOld();


if (isset($_POST['type'])) {
    switch ($_POST['type']) {
        case "reg":
            register($db);
            break;
        case "login":
            login($db);
            break;
        default:
            echo "";
            break;
    }
}


/**
 * @param $db DBUtilsOld
 */
function login($db)
{
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    @$result = $db->myQuery(
        "SELECT count(*) FROM yeek_user WHERE username=? AND password=?",
        [
            $username,
            $password,
        ]
    );
    if($result[0][0]==="1"){
        logined($username);
    }
    echo json_encode(['code' => $result[0][0]]);
    exit();
}


/**
 * @param $db DBUtilsOld
 */
function register($db)
{
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    $email = $_POST['email'];

    @$result = $db->myExecute(
        "INSERT INTO yeek_user(username,password,email) values (?,?,?)",
        [
            $username,
            $password,
            $email
        ]
    );
    if($result==="1"){
        logined($username);
    }
    echo json_encode(['code' => $result]);
    exit();
}


function logined($username){
    $_SESSION['username'] = $username;
}
