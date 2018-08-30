<?php 
$curMonth = date("n");
$curYear = date("Y");
$dayInMonth = cal_days_in_month(CAL_GREGORIAN, $curMonth, $curYear);

$jd = gregoriantojd($curMonth, 1, $curYear);
$firstMonthDay = jddayofweek($jd, 0);
echo "Дней в месяце=".$dayInMonth."<br>";
echo "Первый день месяца=".$firstMonthDay."<br>";


$month = array();
for ($i = 1; $i <= $dayInMonth; $i++)
{
    $month[$i] = $firstMonthDay;
    $firstMonthDay < 6 ? $firstMonthDay++ : $firstMonthDay = 0;
}
echo "<pre>";
print_r($month);
echo "</pre>";
?>