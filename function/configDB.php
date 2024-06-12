<? 
require_once 'classes/Db.php';

switch($_POST['func']) {
    case 'saveDB':
        saveDB();
        break;
    case 'checkDB':
        checkDB();
        break;
    default:
        echo json_encode('Неизвестная функция');
        break; 
}
function saveDB() {
    $dbData = $_POST['Data'];
    $connect = new Db();
    $result = $connect->dbSave($dbData);
    if($result['connect']) {
        echo json_encode(array('error' => false));
    } else {
        echo json_encode(array('error' => true));
    }
}

function checkDB() {
    $connect = new Db();
    $getDataBase = $connect->ConnectDB();
    if(!is_array($getDataBase)) {
        echo json_encode(array('error' => false));
    } else {
        echo json_encode(array('error' => true));
    }
}
