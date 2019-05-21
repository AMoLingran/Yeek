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

if (isset($_SESSION['subject'])) {
    $subject = $_SESSION['subject'];
    if (file_exists("subject/" . $subject. ".php")) {
        $subject_url = $subject . ".php";
        $subject_dir = "file_" . $subject;
        if (!file_exists($subject_dir)) {
            mkdir($subject_dir);
            chmod("$subject_dir",0777);
        }
        if (!file_exists("$subject_dir/index.php")) {
            copy("function/downFile.php", "$subject_dir/index.php");
            chmod("$subject_dir/index.php",0777);
        }
    }
} else {
    $subject_url = "home.php";
}