<?php
class DataBaseSave {
    public $data, $columns, $OnOff, $numberColumns, $dbname;

    public function __construct($data, $columns, $OnOff, $numberColumns, $dbname)
    {
        $this->data = $data;
        $this->columns = $columns;
        $this->OnOff = $OnOff;
        $this->numberColumns = $numberColumns;
        $this->dbname = $dbname;
    }

    public function saveDb() {
        $nameDB = $this->dbname;
        $OnOff = $this->OnOff;
        $connection = $this->connectionDB();
        $requestDB = $connection->query("SHOW TABLES LIKE '$nameDB'"); //проверка на наличие таблицы с таким же именем
        if ($requestDB->num_rows == 0) {
            $SQL = $this->SQLCreate($nameDB); //создание запроса таблицы
            $SQLInsert = $this->SQLInsert($nameDB); //создание SQL запроса INSERT INTO
            $connection->query($SQL);
            $connection->query($SQLInsert);
        } else {
            $this->SQLDelete(); //удаление таблицы в случае если такая уже есть
            $SQL = $this->SQLCreate($nameDB);
            $SQLInsert = $this->SQLInsert($nameDB);
            $connection->query($SQL);
            $connection->query($SQLInsert);
        }
    }

    private function SQLCreate($dbName) {
        $columnsToAdd = $this->OnOff; 
        $columnOrder = $this->numberColumns; 
        $columnName = $this->columns;
        
        $columnTypes = [$columnName[0] => 'VARCHAR(255)', $columnName[1] => 'VARCHAR(255)', $columnName[2] => 'DECIMAL(10,2)', $columnName[3] => 'INT']; //определение типов данных столбцов. Статичны, не успел допилить их настройку

        $columns = [];
        //определение какие стобцы мы добавляем
        foreach ($columnsToAdd as $key => $value) {
            if ($value == 0) {
                $columns[$columnOrder[$key]] = '`'. $columnName[$key] . '` '. $columnTypes[$columnName[$key]];
            }
        }
        //сортировка порядка
        ksort($columns);
        
        $sql = "CREATE TABLE `$dbName` (";
        foreach ($columns as $column) {
            $sql.= $column. ', ';
        }
        $sql = rtrim($sql, ', '); 
        $sql.= ');';


        return $sql;
    }

    private function SQLDelete() {
        $dbname = $this->dbname;
        $SQL = "DROP TABLE `$dbname`";
        $connection = $this->connectionDB();
        $connection->query($SQL);
        return true;
    }

    private function SQLInsert($nameDB) {
        $columnsToAdd = $this->OnOff; 
        $columnName = $this->columns;
        $columnOrder = $this->numberColumns; 
        $columns1 = $this->columns;
        $data = $this->data;
        foreach ($columnsToAdd as $key => $value) {
            if ($value == 0) {
                $columns[$key] = $columnName[$key];
            }
        }
        $query = "INSERT INTO `$nameDB` (";
        foreach ($columns as $key => $column) {
            $query .= "`$column`, ";
        }
        $query = rtrim($query, ', '); 
        $query .= ') VALUES ';

        foreach ($data as $row) {
            $values = [];
            foreach ($columns as $key => $column) {
                //костыль
                if($key == 0) {
                    $key = 'A';
                }
                if($key == 1) {
                    $key = 'B';
                }
                if($key == 2) {
                    $key = 'C';
                }
                if($key == 3) {
                    $key = 'D';
                }
                if (isset($row[$key])) {
                    $values[] = "'". $row[$key]. "'";
                } else {
                    $values[] = "NULL";
                }
            }
            $query .= '('. implode(', ', $values). '), ';
        }
        $query = rtrim($query, ', '); 
        $query .= ';';
        return $query;
    }

    public function selectTable() {
        $nameDB = $this->dbname;
        $connetion = $this->connectionDB();
        $query = "SELECT * FROM `$nameDB`";
        $result = mysqli_query($connetion, $query);
        $selectTable = $result->fetch_all(MYSQLI_ASSOC);
        return $selectTable;
    }

    private function connectionDB() {
        $xmlFile = './config/dbData.xml';
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
}