<?php
function  test($page){
    $whitelist = ["source"=>"source.php","aa"=>"aa.php"];
    if (! isset($page) || !is_string($page)) {
        echo "you can't see it1111";
        return false;
    }

    if (in_array($page, $whitelist)) {
        echo "1111";
        return true;
    }

    $_page = mb_substr(
        $page,
        0,
        mb_strpos($page . '?', '?')
    );
    if (in_array($_page, $whitelist)) {
        echo "2222";
        return true;
    }

    $_page = urldecode($page);
    var_dump($_page);
    $_page = mb_substr(
        $_page,
        0,
        mb_strpos($_page . '?', '?')
    );
    var_dump($_page);
    if (in_array($_page, $whitelist)) {
        return true;
    }
    echo "you can't see it2222";
    return false;

}
if(isset($_POST['text'])){
    var_dump(test($_POST['text']));
    var_dump(htmlentities(urlencode($_POST['text'])));
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>web7</title>
</head>
<body>
<form method="post">

    <input type="text" name="text">
    <input type="submit" name="sub">
</form>







</body>
</html>

