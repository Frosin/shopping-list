<link rel="stylesheet" href="classes/mvc/view/titlejob.css">
<form id="form" method="get" action="<?php echo $_SERVER['SCRIPT_NAME'] ?>">
        <input type="hidden" name="save" value="N" id="save"/>
        <input type="hidden" name="job" value="<?php echo $job;?>" id="job"/>
<div class="container">
<span>titlejob</span>
    <div class="job_title_block">

        <div class="title_block">
            <span class="block_item"> Дата: </span>
            <span class="block_item"> Название: </span>
        </div>
        <div class="title_block">
            <input class="block_item" type="text" name="date" id="date" value="<?php echo $job_date;?>">
            <input class="block_item" type="text" name="jobname" id="jobname">
        </div>      


    </div>
    <div class="btn back_btn" id="back_btn" onclick='history.back()'>&lArr;</div>
    <div class="btn save_btn" id="save_btn" >Сохранить</div>
    <script>
        save_btn =  document.getElementById("save_btn");  
        save_btn.onclick = function ()
        {
            job_submit = document.getElementById("job");
            job_submit.value = <?php echo $job;?>;
            save_submit = document.getElementById("save");
            save_submit.value = "Y";
            form = document.getElementById("form");
            form.submit();
        }
    </script>
</div>
</form>