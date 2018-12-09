<?php
echo "<pre>";
print_r($_REQUEST);
echo "</pre>";


function debug($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function protocol($data)
{
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/protocol.log", date("d.m.Y H:i:s") . " " . $data . "\n" , FILE_APPEND);
}

function error($data)
{
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/errors.log", date("d.m.Y H:i:s") . " " . $data . "\n", FILE_APPEND);
}


class route
{

    public function init()
    {
        require_once("classes/mvc/controller/calendar.php");
        require_once("classes/mvc/controller/titlepage.php");
        require_once("classes/mvc/controller/dayjobs.php");
        require_once("classes/mvc/controller/editjob.php");
        require_once("classes/mvc/controller/titlejob.php");
        require_once("classes/db/db.php");
        require_once('classes/config.php');

        $db = new db($host, $user, $pass, $database);



        if (isset($_REQUEST['day']) && $_REQUEST['day'] > 0 && $_REQUEST['day'] < 32)
            self::showDayjobsPage($db);
        elseif (isset($_REQUEST['cal']) && $_REQUEST['cal'] == "Y")
            self::showCalendarPage();
        elseif (isset($_REQUEST['job']) && is_numeric($_REQUEST['job']))
            {    
                if ($_REQUEST['job'] == 0 && !isset($_REQUEST['save']))
                {
                    self::showEditJobTitle($db);
                } // Пришел ответ:
                elseif (isset($_REQUEST['jobname']) && isset($_REQUEST['date']) && isset($_REQUEST['save']))
                {
                    Controller_titlejob::saveJobName($db, $_REQUEST['job'], $_REQUEST['date'], $_REQUEST['jobname']);
                    $mdate = $_REQUEST['date'];
                    $mdate = date_parse($mdate);
                    header("Location:" . $_SERVER['SCRIPT_NAME']. "?month={$mdate['month']}&day={$mdate['day']}&year={$mdate['year']}&cal=Y");
                    self::showDayjobsPage($db);
                }
                elseif ($_REQUEST['job'] > 0)
                {
                    self::showEditJobPage($db);
                }



            }
        else
            self::showTitlePage($db);
    }

    private function showTitlePage($db)
    {
        Controller_titlepage::showTitlePage($db);
    }

    private function showCalendarPage()
    {
        if (isset($_REQUEST['month']) && 
            in_array($_REQUEST['month'], range(1,12)))
        {
            $reqMonth = (int)$_REQUEST['month'];
        }
        else
        {
            $reqMonth = (int)date("m");
        }
    
        $cal = new Controller_calendar($reqMonth);
        $cal->showCalendar();
    }

    private function showDayjobsPage($db)
    {
        $date = date("Y-m-d", strtotime($_REQUEST['day'].".".$_REQUEST['month'].".".$_REQUEST['year']));
        Controller_dayjobs::showDayjobsPage($db, $date);
    }


    private function showEditJobPage($db)
    {
        Controller_editjob::showEditJobPage($db, $_REQUEST['job'], $_REQUEST['date']);
    }


    private function showEditJobTitle($db)
    {
        Controller_titlejob::showEditJobPage($db, $_REQUEST['job'],  $_REQUEST['date']);
    }



}
