<fieldset id="upWork">
    <form action="#upWork" method="post">
        打包文件名<input type='text' name="mw_name">.zip
        <input type="submit" name="mw_sub" value="更新">
    </form>
    <?php
    if (isset($_POST['mw_sub'])) {
        $nw_name = $_POST['nw_name'];
        system("zip -r file/$nw_name.zip file");
        //旧目录
        if (!file_exists("file/$nw_name.zip")) {
            echo "创建压缩文件失败";
        }elseif(rename("file/$nw_name.zip","oldfile/$nw_name.zip")){
            echo "移动文件成功，文件名为$nw_name.zip";
        }else{
            echo "移动文件失败";
        }


    }
    ?>
</fieldset>