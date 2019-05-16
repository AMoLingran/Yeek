<?php
if(!session_id()){
    session_start();
}
if (isset($_REQUEST['subject'])) {
    if($_REQUEST['subject']==='sql'){
        $_SESSION['sub_name']="SQL Server";
    }
    if($_REQUEST['subject']==='android'){
        $_SESSION['sub_name']="Android";
    }
    if(isset($_SESSION['sub_name'])){
        $_SESSION['subject'] = $_REQUEST['subject'];
    }else{
        $_SESSION['subject'] ='home';
        $_SESSION['sub_name']='未选择科目';
    }
}