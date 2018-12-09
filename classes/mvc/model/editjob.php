<?php

class Model_editjob
{
    public function getPlaceName($db, $job)
    {
        $arShopName = $db->getDataByQuery("
          SELECT name FROM shop WHERE id = 
          (SELECT shop_id FROM shopping WHERE id=$job LIMIT 1) LIMIT 1");
        return $arShopName[0]['name'];
    }

    public function getList($db, $job)
    {

        $data = $db->getDataByQuery("SELECT * FROM shop_list WHERE list_id = 
                (SELECT list_id FROM shopping WHERE id=$job LIMIT 1);");

        return $data;
    }


}