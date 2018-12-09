<?php
/*

$host = 'localhost';
$database = 'iguana';
$user = '';
$pass = '';



$conn = new mysqli($host, $user, $pass, $database);
$result = $conn->query($query);
       if (!$result) {
                    return "Fail";
                        // Здесь запись в лог
                        // $conn->error
              }
                    else {
                            return "Success";
                         }         
}

$rows = $result->num_rows;
            

            $fullTable = array(); // в этот массив запишем то, что выберем из базы         
             for ($i=0; $i < $rows; $i++ ) {              
                 
                $result->data_seek($i);  
                $row = $result->fetch_array(MYSQLI_ASSOC); 
                    for($j = 0; $j < $selectNum; $j++)  {
                       unset($row["selectid$j"]);  // Убиваем ненужные selectidЫ 
                    }  
                $fullTable[] = $row; 
                }


$message = ""; // Здесь будет храниться наш ответ на все запросы



function request($query, $conn) { // Возвращает только сообщение

    $result = $conn->query($query);
       if (!$result) {
                    return "Fail";
                        // Здесь запись в лог
                        // $conn->error
              }
                    else {
                            return "Success";
                         }         
}

$message = request("INSERT INTO $tableName $into $values;",$conn);
request("UPDATE $tableName SET $set WHERE $keyName=$keyValue;",$conn);



*/

//require_once('classes/config.php');

class db {
    
    public $conn;

    public function __construct($host, $user, $pass, $database)
    {
        $this->conn = new mysqli($host, $user, $pass, $database);   
        $this->conn->set_charset("utf8");
    }

    public function getData($table, $fields, $where)
    {
        $request = "SELECT $fields FROM $table WHERE $where;";
        $result = $this->conn->query($request);

        $data = array();
        if ($result)
            while ($row = $result->fetch_assoc()) 
            {
                $data[] = $row;
            }


        return $data;
    }


    public function getDataByQuery($query)
    {
        $result = $this->conn->query($query);

        $data = array();
        if ($result && is_object($result))
            while ($row = $result->fetch_assoc()) 
            {
                $data[] = $row;
            }


        return $data;        
    }
}






?>