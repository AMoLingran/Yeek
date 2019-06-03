<?php
require_once "PHPExcel.php";
function loadExcel($fileName)
{
    try {
        $phpExcel = PHPExcel_IOFactory::load($fileName);
    } catch (PHPExcel_Reader_Exception $e) {
        exit("表格文件不存在");
    }
    $rows = [];
// 行数循环
    foreach ($phpExcel->getWorksheetIterator() as $worksheet) {     //遍历工作表
        //echo 'Worksheet - ' , $worksheet->getTitle() , PHP_EOL;
        foreach ($worksheet->getRowIterator() as $key => $row) {       //遍历行
            //  echo $row->getRowIndex()."<br/>";
            $cellIterator = $row->getCellIterator();   //得到所有列
            $cellIterator->setIterateOnlyExistingCells(false); // Loop all cells, even if it is not set
            foreach ($cellIterator as $cell) {  //遍历列
                if (!is_null($cell)) {  //如果列不给空就得到它的坐标和计算的值
                    $rows[$key][] = $cell->getCalculatedValue();
                }
            }
        }
    }
    return $rows;
}