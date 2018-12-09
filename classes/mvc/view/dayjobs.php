<link rel="stylesheet" href="classes/mvc/view/dayjobs.css">
<form id="form" hidden="true" method="get" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>">
        <input type="hidden" name="job" value="N" id="job"/>
        <input type="hidden" name="date" value="N" id="date"/>
</form>
<div class="container">
<span>dayjobs</span>
    <div class="today_block">
        <a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?cal=Y"> <span> Задачи на <?php echo date("d.m.Y", strtotime($day)) . ":";?></span> </a>
    </div>

    <?php foreach($jobs as $job):?>
        <div class="job_block" id="j<?php echo $job['id'];?>">
            <span><?php if ($job['time']) echo "В ". substr($job['time'], 0, 5) . ", ";
                    echo $job['sh_name'];
                    if ($job['job_count']) echo ", задач: " . $job['job_count'];?></span>
        </div>
        <script>
            j<?php echo $job['id'];?> =  document.getElementById("j<?php echo $job['id'];?>");  
            j<?php echo $job['id'];?>.onclick = function ()
            {
                job_submit = document.getElementById("job");
                job_submit.value = "<?php echo $job['id'];?>";
                date_submit = document.getElementById("date");
                date_submit.value = "<?php echo $day?>";
                form = document.getElementById("form");
                form.submit();
            }
        </script>
    <?php endforeach;?>

    <div class="add_button" id="add_button">+</div>
    <script>
        add_button =  document.getElementById("add_button");  
        add_button.onclick = function ()
        {
            job_submit = document.getElementById("job");
            job_submit.value = "0";
            date_submit = document.getElementById("date");
            date_submit.value = "<?php echo $day?>";
            form = document.getElementById("form");
            form.submit();
        }
    </script>

</div>
