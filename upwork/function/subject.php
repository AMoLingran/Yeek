<?php
if (!session_id()) {
    session_start();
}

if (isset($_REQUEST['subject'])) {
    $_SESSION['subject'] = "home";
    if ($_REQUEST['subject'] === 'sql') {
        $_SESSION['subject'] = "sql";
    }
    if ($_REQUEST['subject'] === 'android') {
        $_SESSION['subject'] = "android";
    }
}

if (isset($_SESSION['subject'])) {
    $subject_url = "home.php";
    $subject = $_SESSION['subject'];
    if (file_exists("subject/" . $subject . ".php")) {
        $subject_url = $subject . ".php";
        $subject_dir = "file_" . $subject;
        if (!file_exists($subject_dir)) {
            mkdir($subject_dir);
            chmod("$subject_dir", 0777);
        }
        if (!file_exists("$subject_dir/index.php")) {
            copy("function/downFile.php", "$subject_dir/index.php");
            chmod("$subject_dir/index.php", 0777);
        }
    }
}