<? 
require_once 'classes/Db.php';

$dbData = [
    'host' => $_POST['host'],
    'user' => $_POST['user'],
    'password' => $_POST['password'],
    'database' => $_POST['database'],
];

$connect = new Db();
$result = $connect->dbSave($dbData);
if($result['connect']) {
    echo json_encode(array('error' => false));
} else {
    echo json_encode(array('error' => true));
}