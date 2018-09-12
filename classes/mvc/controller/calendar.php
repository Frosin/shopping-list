<?php
require_once("classes/mvc/model/calendar.php");
$calendar = new Model_calendar(Model_calendar::getCurMonth(), Model_calendar::getCurYear()); 
$month = $calendar->getMonthInWeeks();


