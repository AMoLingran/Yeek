<?php
function insetStudent($fileName)
{
    require_once "dbConfig.php";
    require_once "../tools/excel/loadExcel.php";
    $pdo = getPDO("mysql", "localhost", "yeek", "utf8", "moreant", "moreant");
    $sql = "INSERT INTO `student` (`id`, `studentId`, `name`, `sex`, `dorm`) VALUES (NULL, :studentId, :name, :sex,:dorm)";
    $pdoS = $pdo->prepare($sql);
    if (!empty($data = loadExcel($fileName))) {
        $data = [];
        foreach ($data as $key => $item) {
            if ($key != 1) {
                try {
                    $data['studentId'] = $item[0];
                    $data['name'] = $item[1];
                    $data['dorm'] = $item[2];
                    $data['sex'] = $item[3];
                    $pdoS->execute($data);
                    if ($pdoS->rowCount() === 1) {
                        echo "插入成功";
                        var_dump($data);
                    };
                } catch (PDOException $e) {
                    if ($e->getCode() == 23000) {
                        echo "插入失败，你插入的信息已存在。<br>错误信息：" . $e->getMessage() . "<br><br>";
                    } else {
                        echo "错误" . $e->getMessage() . "<br><br>";
                    }
                }
            }
        }
    }
}
// a.id,studentId,workId=b.id,status='0'
//UPDATE work set tableName = CONCAT(subject,'_',id) WHERE id = (SELECT id FROM inserted)
$file = "file/student.xlsx";
//insetStudent($file);