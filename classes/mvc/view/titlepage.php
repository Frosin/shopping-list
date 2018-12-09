<link rel="stylesheet" href="classes/mvc/view/titlepage.css">
    <form id="form" hidden="true" method="get" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>">
        <input type="hidden" name="cal" value="someval" id ="cal" />
    </form>
    <div class="container">
    <span>titlepage</span>
        <div class="today_block">
            <span> Сегодня: <?php echo date("d.m.Y");?></span>
        </div>
        <div class="job_list button" id="job_list_button">
            <span>На сегодня задач: <?php echo $jobNum; ?></span>
        </div>
        <div class="edit_plan button" id="edit_plan_button">
            <span>Редактировать/смотреть план</span>
        </div>
        <script> 
            job_list_button =  document.getElementById("job_list_button");  
            job_list_button.onclick = function ()
            {
                submit = document.getElementById("cal");
                submit.value = "1";
                form = document.getElementById("form");
                form.submit();
            } 
            edit_plan_button =  document.getElementById("edit_plan_button");  
            edit_plan_button.onclick = function ()
            {
                submit = document.getElementById("cal");
                submit.value = "Y";
                form = document.getElementById("form");
                form.submit();
            } 
        </script>
    </div>
<pre>
</pre>