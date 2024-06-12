<?php
require_once 'classes/Parsesetting.php';
require_once '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


$file = $_FILES['file'];
$fileName = 'parser.xls';
$filePath = '../config/'. $fileName;
if(move_uploaded_file($file['tmp_name'], $filePath)) {
    $dataColumn = new Parsesetting();
    $result = $dataColumn->parseColumn();
    echo json_encode($result);
}



