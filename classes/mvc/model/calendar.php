<?php 
class Model_calendar
{
/******* Проще сделать через checkdate! */
    public $month;
    public $year;
    public $monthAsArray;

    public function __construct($month, $year)
    {
        $this->month = $month;
        $this->year = $year;
        $this->monthAsArray = $this->getMonthAsArray();
        $this->daysInMonth = $this->getDaysInMonth($month, $year);
    }

    public function getMonthNamesAsArray()
    {
        return array(
            1=>"Январь",
            2=>"Февраль",
            3=>"Март",
            4=>"Апрель",
            5=>"Май",
            6=>"Июнь",
            7=>"Июль",
            8=>"Август",
            9=>"Сентябрь",
            10=>"Октябрь",
            11=>"Ноябрь",
            12=>"Декабрь"
        );
    }


    public function getCurMonth()
    {
        return date("n");
    }

    public function getCurYear()
    {
        return date("Y");
    }

    public function getDaysInMonth($month, $year)
    {
        return cal_days_in_month(CAL_GREGORIAN, $month, $year);
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


    private function getPrevLastMonthDays($num)
    {
        $curMonth = self::getCurMonth();
        $curYear = self::getCurYear();
        $month = 0;

        if ($curMonth > 1)
        {
            $month = $curMonth - 1;
        }
        else
        {
            $month = 12;
            $curYear--;
        }
 
        $days = self::getDaysInMonth($month, $curYear);
        $result = array();

        for ($i = 0; $i < $num; $i++)
        {
            $result[] = $days-$i;
        }

        $result = array_reverse($result);
    
        return $result;
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


        $prevMonthDays = self::getPrevLastMonthDays(7 - $days);


        if ($days < 7)
        {
            $month[0] = array_merge($prevMonthDays,$month[0]);
        }

        $days = count(end($month));
        if ($days < 7)
        {
            $d = 1;
            for ($i = 1; $i <= 7 - $days; $i++)
            {
                array_push($month[count($month) - 1], $d);
                $d++;
            }
        }
        return $month;
    }

    public function getWeekNames()
    {
        return array("Пн","Вт","Ср","Чт","Пт","Сб","Вс");
    }
}

?>