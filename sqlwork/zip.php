<?php
if (isset($_POST['zip'])) {
    system('su - molingran');
    system('11222qaz');
    system('cd /var/www/html/sqlwork');
    system('zip -r file/pack.zip file');
    system('chmod 777 file/pack.zip');
} ?>
<form method="post">
    <input type="submit" name="zip" value="压缩">
</form>
