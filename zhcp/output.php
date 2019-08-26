<?php
//https://blog.csdn.net/studyphp123/article/details/83582267
$json = $_POST['json'];
$rand = md5(time() . mt_rand(0,1000));
$fileName = "output/$rand.php";
copy("example.php",$fileName);
$handle = fopen($fileName, 'r'); // 用 r+ 会把后面的内容覆盖掉
// 将文件的内容读取出来，在开头加入 Hello World
$content = fread($handle, filesize($fileName));
$content = '<?php $json=\''.$json.'\'; ?>' . $content;
fclose($handle);

// 将拼接好的字符串写回到文件当中
$handle = fopen($fileName, 'w');
fwrite($handle, $content);
fclose($handle);
echo json_encode(array("name"=>$fileName));
