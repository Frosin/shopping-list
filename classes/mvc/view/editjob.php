<link rel="stylesheet" href="classes/mvc/view/editjob.css">
<form id="form"  method="get" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>">
        <input type="hidden" name="edit" value="N" id="edit"/>
        <input type="hidden" name="date" value="N" id="date"/>
</form>
    <pre>
    <?php print_r($list);?>
    </pre>
<div class="container">
<span>editjob</span>
    <div class="job_title_block">
        <?php 
            $arDate = date_parse($job_date);
            $month = $arDate['month'];
            $year = $arDate['year'];
            $day = $arDate['day'];
        ?>
        <a href="<?php echo $_SERVER['SCRIPT_NAME'] . "?month=$month&day=$day&year=$year"?>"><?php if ($job):?>
            <span> <?php echo $name." - ". $job_date;?> </span>
        <?php else:?>
            <span> Новая задача на <?php echo $job_date;?> </span>
        <?php endif;?></a>   
        <div class="edit_btn title_btn">ред.</div>
    </div>
    <?php if ($list_count > 0):?>
        <?php $num = 1;?>
        <?php foreach ($list as $item):?>
            <span><?php echo $num;?></span>
            <input data-id="<?php echo $list[$num-1]['id']?>" 
                   name="items[]" class="list_item" <?php if ($item['complete'] == "Y") echo "disabled"; ?>
            value = "<?php echo $item['product_name'] . ', ' . $item['quantity']; $num++ ?>">
        <?php endforeach;?>
    <?php endif;?>   

    <div class="save_btn"> save </div>
    <div class="del_btn"> del </div>
</div>
