<?php
/**
 * Created by PhpStorm.
 * User: MoLingran
 * Date: 3/17 0017
 * Time: 16:19
 */

if (PATH_SEPARATOR == ':') {
    //Linux
    $hostname = '一客';
    $domain = 'yeek.top';
} else {
    //Windows
    $hostname = '校园网';
    $domain = '10.50.43.44';
}
?>
<footer>
    <hr>
    <br>
    <br><br>
    <p>莫泠然 | molingran@yeek.top</p><br>
    <p>Copyright © 2018-<?php echo date('Y')?> Yeek All Rights Reserved.</p><br><br>
</footer>
