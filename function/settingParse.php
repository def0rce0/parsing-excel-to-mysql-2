<?php
require_once 'classes/Parsesetting.php';

//сохранение загруженного файла
$file = $_FILES['file'];
$fileName = 'parser.xls';
$filePath = '../config/'. $fileName;
if(move_uploaded_file($file['tmp_name'], $filePath)) {
    $dataColumn = new Parsesetting();
    $result = $dataColumn->parseColumn();
    echo json_encode($result);
}



