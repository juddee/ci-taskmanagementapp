<div class="sidebar" id="sidebar">
    <div id="closeBtn"><i class="fa fa-times"></i></div>
    <div class="branding">
        <a href="<?= base_url('home')?>"> <i class="fa fa-home"></i> <span>Welcome <?= $user_details->username?></span> </a>
    </div>
    <div class="board-list">
        <label for="list-info" class="list-info">ALL Projects (<?php echo count($projects); ?>)</label>
        <?php foreach($projects as $project): ?>
        <a href="<?php echo base_url('home/').$project['id'] ;?>" class="flex item <?php if($active_sidebar == $project['name']){ echo 'active';}?>"> 
            <i class="fa <?php if($active_sidebar == $project['name']){ echo 'fa-folder-open';}else{ echo 'fa-folder';}?>"></i>
            <p><?php echo $project['name'] ?></p>
            <i class="fa fa-trash" id="action-handler" data-url="<?php echo base_url("delete-project/").$project['id']?>" data-trigger="project-del-warning" title="Delete this project"></i>
        </a>
        <?php endforeach; ?>

        <a href="<?= base_url('change-password')?>" class="flex item <?php if($active_sidebar == 'change-password'){echo 'active';}?>" > 
            <i class="fa fa-wrench"></i>
            <p>Change Password</p>
        </a>
        <div class="flex add-board" id="add-board-btn"> 
            <i class="fa fa-plus" data-trigger="success"></i>
            <p data-trigger="success" title="Create a new project">Create New Project</p>
        </div>

    </div>
</div>