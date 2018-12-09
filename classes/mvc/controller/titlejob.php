<?php
require_once("classes/mvc/model/titlejob.php");
class Controller_titlejob
{
    public static function showEditJobPage($db, $job, $date)
    {
        $name = "";
        if ($job > 0)
        {
            $name = Model_titlejob::getJobName($db, $job);
        }

        $job_date = date("d.m.Y", strtotime($date));
        require('classes/mvc/view/titlejob.php');
    } 

    public static function saveJobName($db, $job, $date, $jobname)
    {
        if ($job == 0)
        {
            Model_titlejob::saveNewJobName($db, $date, $jobname);
        }
        else
        {
            Model_titlejob::saveJobName($db, $job, $date, $jobname);
        }

    }


}