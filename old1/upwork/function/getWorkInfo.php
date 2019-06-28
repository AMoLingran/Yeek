<?php
function getWorkInfo($pdo,$id){
    $sql="SELECT work.name,end,class.name as subName FROM work,class WHERE work.subject=class.callname AND work.id=?";
    $pdoS = $pdo->prepare($sql);
    $exec = $pdoS->execute(array($id));

    if($exec){
        $result = $pdoS->fetch();
        $work = [
            'name'=>$result['name'],
            'end'=>'End on '.date("m/d",strtotime($result['end'])),
            'subName'=>$result['subName'],
        ];
        return $work;
    }else{
        exit();
    }
}