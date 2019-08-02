<?php
if (isset($_POST['getArr'])) {
    if (isset($_POST['class'])) {
        if ($_POST['class'] == "软件1809") {
            $arr = array([
                "item" => "思想素质综合测评（A）",
                "base" => "63",
                "addItem" => [
                    ["itemName" => "", "itemNum" => ""],
                ],
                "addSum" => "",
                "weighted" => "",
                "delItem" => [
                    ["itemName" => "", "itemNum" => ""],
                ],
                "delSum" => "",
                "itemSum" => "",
            ], [
                "item" => "专业知识技能测评（B）",
                "base" => "",
                "addItem" => [
                    ["itemName" => "", "itemNum" => ""],
                ],
                "addSum" => "",
                "weighted" => "",
                "delItem" => [
                    ["itemName" => "", "itemNum" => ""],
                ],
                "delSum" => "",
                "itemSum" => "",
            ], [
                "item" => "文体素质测评（C）",
                "base" => "",
                "addItem" => [
                    ["itemName" => "", "itemNum" => ""],
                ],
                "addSum" => "",
                "weighted" => "",
                "delItem" => [
                    ["itemName" => "", "itemNum" => ""],
                ],
                "delSum" => "",
                "itemSum" => "",
            ], [
                "item" => "社会实践素质·测评（D）",
                "base" => "40",
                "addItem" => [
                    ["itemName" => "", "itemNum" => ""],
                ],
                "addSum" => "",
                "weighted" => "",
                "delItem" => [
                    ["itemName" => "", "itemNum" => ""],
                ],
                "delSum" => "",
                "itemSum" => "",
            ], [
                "sum" => "0",
            ],
            );
            echo json_encode($arr);
        } else {
            echo json_encode(array());
        }
    } else {
        echo json_encode(array());
    }
}
