<?php

require_once("classes/mvc/controller/calendar.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="classes/mvc/view/calendar.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <?php foreach($month as $numWeek => $week):?>
            <div class="week_block">
                <?php foreach($week as $num => $day ):?>
                    <div class="day_block">
                        <?php if ($day > -1):?>
                            <span class="day_label">
                                <?php echo $day;?>
                            </span> 
                        <?php endif;?>
                    </div>
                <?php endforeach;?>    
            </div> 
        <?php endforeach;?>   
</body>
</html>