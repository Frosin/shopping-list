<?php
require_once("classes/mvc/model/editjob.php");
class Controller_editjob
{
    public static function showEditJobPage($db, $job, $date)
    {
        
        $name = Model_editjob::getPlaceName($db, $job);
        $list = Model_editjob::getList($db, $job);
        $list_count = count($list);
        $job_date = date("d.m.Y", strtotime($date));
        require('classes/mvc/view/editjob.php');
    } 
}