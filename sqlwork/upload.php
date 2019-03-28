<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <label for="file">Filename:</label> <input type="file" name="Filedata" id="Filedata"/>
    <br/>
    <input type="submit" name="submit" value="Submit"/>
</form>
<?php
if (isset($_POST['submit'])) {
    $uploadDir = "/uploads/";
    $RealTitleID = $_FILES['Filedata']['name'];
    $ch = curl_init("http://yeek.top/sqlwork/receive.php");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $args['file'] = new CurlFile($_FILES['Filedata']['tmp_name'], 'file/exgpd', $RealTitleID);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
    $result = curl_exec($ch);
    echo $result;
}
?>
