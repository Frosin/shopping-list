<link rel="stylesheet" href="classes/mvc/view/calendar.css">
<div class="container">
    <div class="current_month_name"><?php echo $monthName."'".$year;?></div>
    <div class="week_block"> 
        <?php foreach($weekNames as $key=> $weekName): ?>
            <div class="day_name_block <?php echo ($key >= 5)? "weekend":"";?>">
            <span class="day_name_label">
                <?php echo $weekName; ?>
            </span>
            </div>
        <?php endforeach;?>
    </div>

    <?php foreach($month as $numWeek => $week):?>
        <div class="week_block">
            <?php foreach($week as $num => $day ):?>
                <?php $modify = ($numWeek == 0 && $day > 25) || ($numWeek > 3 && $day < 10) ?"last_month":"current_month";  ?>
                <div class="day_block <?php echo $modify; ?>" <?php if ($modify == "current_month") echo 'id="d'.$day.'"';?>>
                    <span class="day_label">
                            <?php echo $day;?>
                    </span> 
                </div>
                <?php if ($modify == "current_month"):?>
                    <script>
                        d<?php echo $day;?> =  document.getElementById("d<?php echo $day;?>");  
                        d<?php echo $day;?>.onclick = function ()
                        {
                            day_submit = document.getElementById("day");
                            day_submit.value = "<?php echo $day;?>";
                            month_submit = document.getElementById("month");
                            month_submit.value = "<?php echo $monthNum;?>";
                            form = document.getElementById("form");
                            form.submit();
                        }
                    </script>
                <?php endif;?>
            <?php endforeach;?>    
        </div> 
    <?php endforeach;?>  
    <a class="to_home_link" href="/">&lArr;</a> 
    <div class="button <?php echo $leftButtonClass?>" id="button_left"><=</div>
    <div class="button <?php echo $rightButtonClass?>" id="button_right">=></div>

    <form id="form" hidden="true" method="get" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>">
        <input type="hidden" name="month" value="current" id ="month" />
        <input type="hidden" name="day" value="-1" id ="day" />
        <input type="hidden" name="year" value="20<?php echo $year;?>" id ="day" />
        <input type="hidden" name="cal" value="Y"/>
    </form>
    <?php if (!$leftButtonClass):?>
        <script> 
            button_left =  document.getElementById("button_left");  
            button_left.onclick = function ()
            {
                submit = document.getElementById("month");
                submit.value = "<?php echo $monthNum - 1;?>";
                form = document.getElementById("form");
                form.submit();
            } 
        </script>
    <?php endif;?>

    <?php if (!$rightButtonClass):?>
        <script> 
            button_right =  document.getElementById("button_right");  
            button_right.onclick = function ()
            {
                submit = document.getElementById("month");
                submit.value = "<?php echo ($monthNum < 12 ? $monthNum : 1);?>";
                form = document.getElementById("form");
                form.submit();
            } 
        </script>
    <?php endif;?>
</div>     