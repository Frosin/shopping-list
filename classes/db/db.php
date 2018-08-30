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


*/

class db {
    
    public $conn;

    public function __construct($host, $user, $pass, $database)
    {
        $conn = new mysqli($host, $user, $pass, $database);
    }



}






?>