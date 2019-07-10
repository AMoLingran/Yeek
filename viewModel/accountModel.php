<?php
include_once "../myHead.php";

$db = new DBUtils();
$account = new Account($db);


/**
 *  accountModel的返回码
 * 1 成功
 *
 * -1 未知错误
 * -2 账号已存在
 * -3 邮箱已存在
 *
 */
if (!empty($_POST)) {
    @$username = $_POST['username'];
    @$password = sha1($_POST['password']);
    //关闭undefined警号，避免jQuery获取json对象错误
    @$email = $_POST['email'];

    if (isset($_POST['register'])) {
        //不能return，否则jQuery接收不到json
        echo register($username, $password, $email);
        //发送完及时exit
        exit();
    }
    //上面的简洁的复杂写法(不方便维护)
    if (isset($_POST['login'])) exit(@login($username, $password));

    if (isset($_POST['check'])) {
        echo checkUserInfo($_POST['columns'], $_POST['values']);
    }
} else {
    //没有post时的执行
    //以后改成跳转到404
    exit("打开方式不对");
}

/**
 * 如果查询成功返回user数据，失败返回 [] (空json)
 *
 * @param string $username
 * @param string $password
 * @return null|int
 */

function login($username, $password)
{
    global $account;
    $result = $account->login($username, $password);
    if($result){
        setcookie('username', $result[0]['username'],time()+5*24*3600,"/");
        setcookie('password', $result[0]['password'],time()+5*24*3600,"/");
        $_SESSION['username']=$result[0]['username'];

    }
    return json_encode($result);
}

/**
 * 同上
 *
 * @param string $username
 * @param string $password
 * @param string $email
 * @return false|string
 */
function register($username, $password, $email = "")
{
    global $account;
    $result = $account->register($username, $password, $email);
    return json_encode(array("code" => $result));
}

/**
 * 查询user表中是否有$columns字段的值
 *
 * @param string $columns
 * @param mixed $values
 * @return false|string
 */
function checkUserInfo($columns, $values)
{
    global $account;
    $result = $account->checkUserInfo($columns, $values);
    return json_encode($result);
}