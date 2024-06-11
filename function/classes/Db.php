<? 
class Db {

    private $host, $username, $password, $dbname;
    function __construct($host,$username,$password,$dbname)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    private function checkConnect() {
        $xmlFile = './config/dbData.xml';
        $xml = simplexml_load_file($xmlFile);

        $host = $xml->host;
        $username = $xml->user;
        $password = $xml->password;
        $database = $xml->dbname;

        $connect = new mysqli($host,$username,$password,$database);
        if ($connect->connect_error) {
                return false; 
            }
                else 
            { 
                return $connect; 
            };
    }


}