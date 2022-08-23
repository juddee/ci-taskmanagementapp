<header>
    <nav class="flex justify-content-between align-items-center">
        <div class="flex align-items-center board-title">
            <div id="toggleBtn">
                <i class="fa fa-bars"></i>
            </div>
            
            <p><small><?php echo $active_sidebar; ?>  <?php if(isset($task_details)) { echo ' <i class="fa fa-angle-double-right"></i> '.$task_details->title; } ?></small></p>
        </div>
        <div class="flex actionBtn">
            <button class="addtaskBtn" title="Add New Task to Current Board">  
                <i class="fa fa-plus"></i> 
                <span>Add New Task</span>
            </button>
            <div class="settingIcon">
                <a href="<?= base_url('logout')?>"> Logout</a>
            </div>
        </div>

    </nav>
</header>