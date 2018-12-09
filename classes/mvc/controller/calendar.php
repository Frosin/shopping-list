<?php
require_once("classes/mvc/model/calendar.php");

//$month_num = $_POST['month_num'];
class Controller_calendar
{
    public $calendar;
    public $month;
    public $weekNames;
    private $curYear;

/*
*
* Get current month
* @param int month to show
*
*/

    function __construct($month)
    {
        $curMonth = Model_calendar::getCurMonth();
        $curYear = Model_calendar::getCurYear();
        $this->curYear = $curYear;
        $year = $curYear;
        if ($curMonth == 1 && $month == 12) $year--;
        if ($curMonth == 12 && $month == 1) $year++;

        $this->calendar = new Model_calendar($month, $year); 
        $this->month = $this->calendar->getMonthInWeeks();
        $this->weekNames = $this->calendar->getWeekNames();
    }

    public function showCalendar()
    {
        $calendar = $this->calendar;
        $month = $this->month;
        $weekNames = $this->weekNames;
        $monthName = $calendar->getMonthNamesAsArray()[$calendar->month];
        $monthNum = $calendar->month;
        $year = substr(strval($calendar->year), 2, 2);

        if ($monthNum > $this->calendar->getCurMonth() ||
            $this->curYear < $calendar->year)
        {
            $rightButtonClass = "disabled";
            $leftButtonClass = "";
        }
        else
        {
            $leftButtonClass = "disabled";
            $rightButtonClass = "";
        }

        require('classes/mvc/view/calendar.php');
    } 
}




