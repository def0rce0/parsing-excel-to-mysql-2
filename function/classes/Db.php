<? 
class Db {

    public function ConnectDB() {
        $xmlFile = '../config/dbData.xml';
        $xml = simplexml_load_file($xmlFile);

        $host = $xml->host;
        $username = $xml->user;
        $password = $xml->password;
        $database = $xml->dbname;
        try {
            $connect =@new mysqli($host,$username,$password,$database);
            return $connect;
        }
        catch (mysqli_sql_exception $e) {
            return array('error' => true, 'msg' => $e->getMessage());
        }
    }

    public function dbSave($dbData) {
        $xmlFile = '../config/dbData.xml';
        $xml = simplexml_load_file($xmlFile);
        $xml->host = $dbData['host'];
        $xml->user = $dbData['user'];
        $xml->password = $dbData['password'];
        $xml->dbname = $dbData['database'];
        $xml->asXML($xmlFile);
        $connection = $this->ConnectDB();
        if(is_array($connection)) {
            return array('connect' => 0, 'error' => $connection['msg']); 
        } else { 
            return array('connect' => 1);
        };
    }
    
}