<?php
require_once("classes/mvc/model/dayjobs.php");

class Controller_dayjobs
{
    public static function showDayjobsPage($db, $day)
    {
        $jobs = Model_dayjobs::getJobs($db, $day);
        require('classes/mvc/view/dayjobs.php');
    } 
}