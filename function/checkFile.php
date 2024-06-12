<?php 
require_once 'classes/Parsesetting.php';
if(file_exists('../config/parser.xls')) {
    $dataColumn = new Parsesetting();
    $result = $dataColumn->parseColumn();
    echo json_encode($result);
} else { echo json_encode('File not exit'); };