<?php
if (isset($_POST['getArr'])) {


        echo json_encode(array());

}
if (isset($_POST['download'])) {
    $data = $_POST['data'];
//    $data = json_decode($data,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE  );
//    $data = json_encode($data,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE  );
    $file = fopen("aaa.json",'w+');
    fwrite($file, $data);
    echo json_encode(array("name"=>'aaa.json'));
}