<?php 
require_once '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Reader\Xls;
class Parsesetting {

    public function parseColumn() {
        $reader = new Xls();
        $spreadsheet = $reader->load('../config/parser.xls');
        $sheet = $spreadsheet->getActiveSheet();
        $columName = [];
        for ($col = 'A'; $col <= 'D'; $col++) {
            array_push($columName,$sheet->getCell($col. '1')->getValue());
        }
        $result = [];
        foreach($columName as $cell) {
            $cell = $this->translit($cell);
            $result[] = $cell;
        }
        return $result;
    }

    function translit($s) {
        //изменение кириллицы на латиницу для корректной работы с БД
        $s = (string) $s; 
        $s = trim($s); 
        $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); 
        $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>'',' ' => '_'));
        return $s; 
    }
}