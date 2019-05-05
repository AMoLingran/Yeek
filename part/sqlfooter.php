<?php
/**
 * Created by PhpStorm.
 * User: MoLingran
 * Date: 3/17 0017
 * Time: 16:19
 */

$rootUrl = include_once ('RootURl.php');
$rootUrl = $rootUrl.'part/';
?>
<footer>

    <br>
    <hr>
    <br><br>
    <p>莫泠然 | molingran@yeek.top</p><br>
    <p>Copyright © 2018-<?php echo date('Y') ?> Yeek All Rights Reserved.</p>
    <div style="width:300px;margin:0 auto; padding:20px 0;">
        <a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=44011102002523"
           style="display:inline-block;text-decoration:none;height:20px;line-height:20px;">
            <img src="<?php echo $rootUrl;?>beian.png" style="float:left;"/>
            <p style="float:left;height:20px;line-height:20px;
            margin: 0 0 0 5px; color:#939393;">
                粤公网安备 44011102002523号</p></a>
    </div>
    <br><br>
</footer>
