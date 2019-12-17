<?php

function WriteExcel($fileName, $data) {
    $writeFile = fopen($fileName, 'w');
    foreach ($data as $line) {
        fwrite($writeFile, implode("\t", $line)."\n");
    }
    fclose($writeFile);
}

function ReadExcel($fileName) {
    $readFile = fopen($fileName, 'r');
    $data = array();
    while (!feof($readFile)) {
        $line = fgets($readFile);
        $line = str_replace("\n", "", $line);
        if ($line != "") {
            $item = explode("\t", $line);
            $data[] = $item;
        }
    }
    return $data;
}

$data = array(
    array("序号", "学号", "姓名", "年龄"),
    array("1", "19113301", "张三", "25"),
    array("2", "19113302", "李四", "25"),
);

WriteExcel("test.xls", $data);
$ret = ReadExcel("test.xls");
var_dump($ret);