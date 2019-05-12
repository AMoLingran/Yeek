<?php
if(!file_exists('file/')){
    mkdir('file/');
}
if(isset($_POST['submit'])){
    var_dump($_FILES);
    move_uploaded_file($_FILES['file']['tmp_name'],'file/'.$_FILES['file']['name']);
}

?>

<form action="test.php" enctype="multipart/form-data" method="post">
    <input type="file" name="file">
    <input type="submit" name="submit" value="提交">
</form>
