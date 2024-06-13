<?php 
    require_once 'classes/DataBaseSave.php';
    require_once 'classes/ParseData.php';
    if(isset($_POST["columns"])) {
        $search = ($_POST["search"]); //параметры парсера
        $sizeSearch = ($_POST["sizeSearch"]); //количество строк
        $parse = new ParseData();
        $result = $parse->parsingData($search,$sizeSearch);
        if(!empty($result)){ 
        $Db = new DataBaseSave($result, $_POST["columns"], $_POST["OnOff"], $_POST["numberColumns"], $_POST["dbname"]);
        $Db->saveDb();
        $dataTable = $Db->selectTable();
    } else { $dataTable = 'No Data';}
    } else { $dataTable = 'No Data';}
    
    
?>