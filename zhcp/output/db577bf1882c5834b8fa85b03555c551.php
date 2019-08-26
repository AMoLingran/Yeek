<?php $json='[{"item":"思想素质综合测评（A）","base":"","addItem":[{"itemName":"","itemNum":""}],"addSum":"","classAddMax":"","itemAddMax":"20","weighted":0,"delItem":[{"itemName":"","itemNum":""}],"delSum":"","itemSum":0,"remarks":""},{"item":"专业知识技能测评（B）","base":"","addItem":[{"itemName":"","itemNum":""}],"addSum":"","classAddMax":"","itemAddMax":"15","weighted":0,"delItem":[{"itemName":"","itemNum":""}],"delSum":"","itemSum":0,"remarks":""},{"item":"文体素质测评（C）","base":"","addItem":[{"itemName":"","itemNum":""}],"addSum":"","classAddMax":"","itemAddMax":"40","weighted":0,"delItem":[{"itemName":"","itemNum":""}],"delSum":"","itemSum":0,"remarks":""},{"item":"社会实践素质·测评（D）","base":"","addItem":[{"itemName":"","itemNum":""},{"itemName":"","itemNum":""}],"addSum":"","classAddMax":"","itemAddMax":"50","weighted":0,"delItem":[{"itemName":"","itemNum":""}],"delSum":"","itemSum":0,"remarks":""},{"sum":0,"file":"","weighted":0,"itemSum":null}]'; ?><?php
//$json = '[{"item":"思想素质综合测评（A）","base":"60","addItem":[{"itemName":"","itemNum":""}],"addSum":"20","classAddMax":"20","itemAddMax":"20","weighted":0,"delItem":[{"itemName":"","itemNum":""}],"delSum":"","itemSum":80,"remarks":""},{"item":"专业知识技能测评（B）","base":"","addItem":[{"itemName":"","itemNum":""}],"addSum":"4","classAddMax":"15","itemAddMax":"15","weighted":0,"delItem":[{"itemName":"","itemNum":""}],"delSum":"","itemSum":4,"remarks":""},{"item":"文体素质测评（C）","base":"","addItem":[{"itemName":"","itemNum":""}],"addSum":"4","classAddMax":"41","itemAddMax":"40","weighted":3.9,"delItem":[{"itemName":"","itemNum":""}],"delSum":"","itemSum":3.9,"remarks":""},{"item":"社会实践素质·测评（D）","base":"","addItem":[{"itemName":"","itemNum":""},{"itemName":"","itemNum":""}],"addSum":"4","classAddMax":"50","itemAddMax":"50","weighted":0,"delItem":[{"itemName":"","itemNum":""}],"delSum":"","itemSum":4,"remarks":""},{"sum":19.19,"itemSum":null,"weighted":0}]';
echo "需要的同学自己复制粘贴，css和美化、下载为txt什么的我就不去弄了，可以但没必要<br>";
echo "欢迎来到我的博客瞧瞧 <a href='moreant.github.io'>Moreant</a>";
echo "如果你想刷新文件，请保存好备份之后，点击计算器的 重置 按钮<br><br>";

$arr = json_decode($json, true);
foreach($arr as $key =>$item ){
    if($key==4){
        echo "总分".$item['sum'];
    }else{
        @show($item);
    }

}
function show($array)
{
    echo $array['item'] . "<br>";
    echo '表现分：' . $array['base'] . "<br>";
    echo "===加分===" . "<br>";
    foreach ($array['addItem'] as $key => $item) {
        echo $item['itemName'] . " " . $item['itemNum'] . "<br>";
    }
    echo "加分总数：" . $array["addSum"]."<br>";
    if($array['weighted']){
        echo "本班最高加分".$array['classAddMax']. "<br>";
        echo "奖励分：".$array['weighted']. "<br>";
    }
    if($array['delItem']){
        echo "===扣分===" . "<br>";
        foreach ($array['delItem'] as $key => $item) {
            echo $item['itemName'] . " " . $item['itemNum'] . "<br>";
        }
        echo "扣分总数：" . $array["delSum"]."<br>";
        echo "项总分：" . $array['itemSum']. "<br>";
    }

    echo "<br><br>";
}

?>