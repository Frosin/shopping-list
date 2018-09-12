<?php 
class Model_calendar
{

    public $month;
    public $year;
    public $monthAsArray;

    public function __construct($month, $year)
    {
        $this->month = $month;
        $this->year = $year;
        $this->monthAsArray = $this->getMonthAsArray();
        $this->daysInMonth = $this->getDaysInMonth();
    }

    public function getCurMonth()
    {
        return date("n");
    }

    public function getCurYear()
    {
        return date("Y");
    }

    public function getDaysInMonth()
    {
        return cal_days_in_month(CAL_GREGORIAN, $this->month, $this->year);
    }


    public function getMonthAsArray()
    {
        $jd = gregoriantojd($this->month, 1, $this->year);
        $firstMonthDay = jddayofweek($jd, 0);
        $dayInMonth = self::getDaysInMonth($this->month, $this->year);
        $month = array();
        for ($i = 1; $i <= $dayInMonth; $i++)
        {
            $month[$i] = $firstMonthDay;
            $firstMonthDay < 6 ? $firstMonthDay++ : $firstMonthDay = 0;
        }
        return $month;
    }

    public function getMonthInWeeks()
    {
        $data = $this->monthAsArray;
        $month = array();
        $pointer = 0;
        foreach ($data as $day => $value)
        {   
            $month[$pointer][] = $day;

            if ($value == 0)
            {
                $pointer++;
            }
        }

        $days = count($month[0]);
        if ($days < 7)
        {
            for ($i = 1; $i <= 7 - $days; $i++)
            {
                array_unshift($month[0], -1);
            }
        }

        $days = count(end($month));
        if ($days < 7)
        {
            for ($i = 1; $i <= 7 - $days; $i++)
            {
                array_push($month[count($month) - 1], -1);
            }
        }
        return $month;
    }
}

?>