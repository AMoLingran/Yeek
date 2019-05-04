<?php
{
    $string  = '';
    $dir = 'file';
    foreach (glob($dir . '/*') as $file) {
        $string = $string . $file;
    }
    if (strpos($string, '05180842') == true) {
        echo "<br>0" . '5180842' . "<br>";
    } else {
        echo "<span>0" . '5180842' . "</span><br>";
    }

    if (strpos($string, '06181248') == true) {
        echo "<br>0" . '6181248' . "<br>";
    } else {
        echo "<span>0" . '6181248' . "</span><br>";
    }

    for ($x = 901; $x <= 954; $x++) {
        if (strpos($string, $x . "") == true) {
            echo '07180' . $x . "<br>";
        } else {
            echo '<span>07180' . $x . "</span><br>";
        }
    }
}
?>