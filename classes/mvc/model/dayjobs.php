<?php

class Model_dayjobs
{
    public function getJobs($db, $date)
    {
        
        $jobs = $db->getDataByQuery("SELECT * FROM shopping 
            LEFT JOIN (SELECT id AS sid, name AS sh_name FROM shop) AS s 
            ON shopping.shop_id = s.sid WHERE shopping.date='$date';"); 
        
        foreach ($jobs as &$job)
        {
            $list = $db->getData("shop_list", "id", "list_id=".$job['list_id'].";");
            $job['job_count'] = count($list);
        }
        
        return $jobs;
    }
}