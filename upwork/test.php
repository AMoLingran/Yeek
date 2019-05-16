<?php
$fileDir='file/';
    $dh = opendir($fileDir);
    while ($file = readdir($dh)) {
        if ($file != "." && $file != "..") {
            $fullpath = $fileDir . "/" . $file;
            unlink($fullpath);
        }
    }
