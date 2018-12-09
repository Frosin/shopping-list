<?php


class Model_titlepage
{
    public function getJobNum($db, $date)
    {
        $jobs = $db->getData("shopping", "id", "date='" . $date .  "' AND " . "complete=0");
        return count($jobs);
    }
}