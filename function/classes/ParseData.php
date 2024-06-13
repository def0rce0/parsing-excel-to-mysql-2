<? 
require_once './vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Reader\Xls;
class ParseData {
    public function parsingData($search,$sizeSearch) {
        $filePath = './config/parser.xls'; 
        $quantity = $sizeSearch;
        $reader = new Xls();
        $spreadsheet = $reader->load($filePath);

        $worksheet = $spreadsheet->getActiveSheet();

        $data = [];
        //получение данных из excel в ассоциативный массив. 
        foreach ($spreadsheet->getWorksheetIterator() as $worksheet) {
            $sheetName = $worksheet->getTitle();
            $data[$sheetName] = [];
            foreach ($worksheet->getRowIterator() as $row) {
                $rowData = [];
                foreach ($row->getCellIterator() as $cell) {
                    $columnLetter = $cell->getColumn();
                    $rowData[$columnLetter] = $cell->getValue();
                }
                $data[$sheetName][] = $rowData;
            }
        }
        //определение параметров для поиска
        $searchParams = array(
            'A' => $search[0], 
            'B' => $search[1], 
            'C' => $search[2], 
            'D' => $search[3], 
        );
        $dataParser = $data[$sheetName];
        foreach ($dataParser as $key => $value) {
            if (empty($value['A'])) {
                unset($dataParser[$key]);
                continue;
            }
    
            // фильтр для значения Артикула
            if (!empty($searchParams['A'])) {
                $subString = $searchParams['A'];
                if (strpos($subString, ';') !== false) {
                    list($min, $max) = explode(';', $searchParams['A']);
                    if ($value['A'] < $min || $value['A'] > $max) {
                        unset($dataParser[$key]);
                        continue;
                    }
                } elseif (strpos($searchParams['A'], '-') !== false) {
                    list($min, $max) = explode('-', $searchParams['A']);
                    if ($value['A'] < $min || $value['A'] > $max) {
                        unset($dataParser[$key]);
                        continue;
                    }
                } else {
                    if (stripos($value['A'], $subString) === false) {
                        unset($dataParser[$key]);
                        continue;
                    }
                }
            }
    
            // фильтр для значения Названия
            if (!empty($searchParams['B']) && stripos($value['B'], $searchParams['B']) === false) {
                unset($dataParser[$key]);
                continue;
            }
    
            // фильтр для значения Цены
            if (!empty($searchParams['C'])) {
                if (strpos($searchParams['C'], '-') !== false) {
                    list($min, $max) = explode('-', $searchParams['C']);
                    if ($value['C'] < $min || $value['C'] > $max) {
                        unset($dataParser[$key]);
                        continue;
                    }
                } elseif ($searchParams['C'][0] == '<') {
                    if ($value['C'] >= substr($searchParams['C'], 1)) {
                        unset($dataParser[$key]);
                        continue;
                    }
                } elseif ($searchParams['C'][0] == '>') {
                    if ($value['C'] <= substr($searchParams['C'], 1)) {
                        unset($dataParser[$key]);
                        continue;
                    }
                } elseif ($value['C'] != $searchParams['C']) {
                    unset($dataParser[$key]);
                    continue;
                }
            }
    
            // фильтр для значения Остатка
            if (!empty($searchParams['D'])) {
                if (strpos($searchParams['D'], '-') !== false) {
                    list($min, $max) = explode('-', $searchParams['D']);
                    if ($value['D'] < $min || $value['D'] > $max) {
                        unset($dataParser[$key]);
                        continue;
                    }
                } elseif ($searchParams['D'][0] == '<') {
                    if ($value['D'] >= substr($searchParams['D'], 1)) {
                        unset($dataParser[$key]);
                        continue;
                    }
                } elseif ($searchParams['D'][0] == '>') {
                    if ($value['D'] <= substr($searchParams['D'], 1)) {
                        unset($dataParser[$key]);
                        continue;
                    }
                } elseif ($value['D'] != $searchParams['D']) {
                    unset($dataParser[$key]);
                    continue;
                }
            }
        }
            $filterParse = [];
            foreach($dataParser as $key){
                $filterParse[] = $key;
            }
            //ограничение по выводимым строкам
            if($quantity == 0) {
                $outPutArray = array_slice($filterParse,1);
                return $outPutArray;
            } else {
                $outPutArray = array_slice($filterParse,1,$quantity);
                return $outPutArray;
            }
        }
}
