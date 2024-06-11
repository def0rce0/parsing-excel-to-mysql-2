<? 
require_once 'classes/Db.php';

$dbDate = [
    'host' => $_POST['host'],
    'user' => $_POST['user'],
    'password' => $_POST['password'],
    'database' => $_POST['database'],
];

$connect = new Db($dbDate['host'], $dbDate['user'], $dbDate['password'], $dbDate['database']);