<?php

$file = $_FILES['file'];
$fileName = 'parser.xls';
$filePath = '../config/'. $fileName;
echo json_encode($file);
move_uploaded_file($file['tmp_name'], $filePath);
