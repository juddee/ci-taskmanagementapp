<div class="sidebar" id="sidebar">
    <div id="closeBtn"><i class="fa fa-times"></i></div>
    <div class="branding">
        <a href="<?php echo base_url('home')?>"> <i class="fa fa-home"></i> <span>Anoda TaskApp</span> </a>
    </div>
    <div class="board-list">
        <a href="<?php echo base_url('change-password');?>" class="flex item <?php if($active_sidebar == 'change-password'){echo 'active';}?>" > 
            <i class="fa fa-wrench"></i>
            <p>Change Password</p>
        </a>
        <div class="flex add-board" id="add-board-btn"> 
            <i class="fa fa-plus" data-trigger="success"></i>
            <p data-trigger="success">Create New Project</p>
        </div>

    </div>
</div>