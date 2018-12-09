<?php
require_once("classes/mvc/model/titlepage.php");

class Controller_titlepage
{
    public static function showTitlePage($db)
    {
        $jobNum = Model_titlepage::getJobNum($db, date("Y-m-d"));
        require('classes/mvc/view/titlepage.php');
    } 
}