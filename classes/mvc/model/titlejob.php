<?php

class Model_titlejob
{
    public function getJobName($db, $job)
    {
        $arShopName = $db->getDataByQuery("
          SELECT name FROM shop WHERE id = 
          (SELECT shop_id FROM shopping WHERE id=$job LIMIT 1) LIMIT 1");
        return $arShopName[0]['name'];
    }


    public function saveNewJobName($db, $date, $name)
    {
        if ( !preg_match("/^[0-9]{1,2}.[0-9]{1,2}.[0-9]{4}$/", $date) ) 
        {
            error_log("Введена неверная дата! " . $date);
            die("Неверный формат даты!<br><b style = 'cursor: pointer; border: 2px solid red;' onclick='history.back()'> Назад </b>");
        }

        $ndate = strtotime($date);

        $date = date("Y-m-d", $ndate);

        $oldName = $db->getDataByQuery("SELECT id FROM shop WHERE name='$name'");
        if (!empty($oldName))
        {
            $jobId = $oldName[0]['id'];
        }
        else
        {
            $result = $db->getDataByQuery("INSERT INTO shop (name) VALUES('$name')");
            $jobId = $result[0]['id'];
        }


        

        $result = $db->getDataByQuery("INSERT INTO shopping (date, shop_id) VALUES('$date', '$jobId')");

    }

    public function saveJobName($db, $job, $date, $name)
    {

    }



}