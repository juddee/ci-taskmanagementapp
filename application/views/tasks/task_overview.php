<?php $this->load->view('projects/templates/header'); ?>
    <div class="container">
        <!-- sidebar start here -->
        <?php $this->load->view('projects/templates/sidebar'); ?>
        <!-- sidebar ends here -->
        <!-- right section start here -->
        <div class="main-content">
            <!-- header start here -->
            <?php $this->load->view('projects/templates/navbar'); ?>
            <!-- header ends here -->

            <!-- dashboard start here -->
            <div class="dashboard">
                <div class="subTaskForm">
                    <form class="" method="post" action="<?php echo base_url('add-subtask');?>">
                        <h3 class="flex justify-content-between"> 
                            <span>Task: <?php echo $task_details->title ?> </span>
                            <span  class="tasks-action"> 
                                <i id="action-handler" data-url="<?php echo base_url("delete-task/").$task_details->id?>" data-trigger="task-del-warning" class="fa fa-trash" title="Delete this task and it's sub-tasks"></i> 
                                <i id="action-handler"  data-trigger="edit-task" class="fa fa-edit" title="Edit task title and description"></i> 
                               
                            </span>
                        </h3>
                        <label for="">Add SubTask</label>
                        <div class="grid subtask">
                            <input type="hidden"  name="task_id" value="<?php echo $task_details->id ?>">
                            <input type="text" placeholder=" e.g Get logo designer from fiverr" name="title">
                            <input type="submit" value="Add" class="subBtn">
                        </div>                        
                    </form>
                </div>
                <h2 class="taskTitle"><?php echo $task_details->title;?> </h2> 
                <div class="task-description">
                    <?php echo $task_details->description; ?>
                </div>

                <div class="subtask-list">
                    <h3>Subtasks (<?php echo count($sub_tasks); ?>) <span class="my-hr" style="width: 150px;"></span> </h3>
                    <div>
                        <?php foreach($sub_tasks as $subtask ): ?>
                        <div class="flex  sub-card">
                            <!-- if status is checked add (id,0) to data-url else (id,1) 0 for uncheck 1 for check -->
                            <?php if($subtask['status'] == 1):?>
                                <i class="fa fa-check-square" id="action-handler" data-url="<?php echo base_url('sub_tasks/uncheck_task/').$subtask['id']; ?>" data-trigger="check-warning"></i>
                            <?php else: ?>
                            <!-- when status unchecked display this -->
                                <i class="fa fa-square-o" id="action-handler" data-url="<?php echo base_url('sub_tasks/check_task/').$subtask['id']; ?>" data-trigger="check-warning"></i>
                            <?php endif; ?>
                                <p><?php echo $subtask['title'];?></p>
                                <i class="fa fa-trash" id="action-handler" data-url="<?php echo base_url('sub_tasks/delete_task/').$subtask['id'];?>" data-trigger="del-warning"></i>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <!-- dashboard ends here -->
        </div>
        <!-- right section ends here -->

    </div>

    <?php $this->load->view('projects/templates/modal'); ?>


    <script src="<?= base_url('public/') ?>js/script.js"></script>
    
    <script src="<?= base_url('public/') ?>js/modal.js"></script>
</body>
</html>