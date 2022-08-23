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
               <div class="grid inner-menu">
                    <p id="modal-handler" data-trigger="todo"> 
                        <i class="fa fa-square color-todo" data-trigger="todo"></i> 
                        <span data-trigger="todo"><?php $todo_num=0; foreach($tasks as $task){if($task['status']==0){$todo_num++;} }  ?>   Todo (<?php echo $todo_num; ?>) </span>
                        <span class="hr" data-trigger="todo"></span>
                    </p>
                    <p id="modal-handler" data-trigger="doing"> 
                        <i class="fa fa-square color-doing" data-trigger="doing"></i> 
                        <span data-trigger="doing"><?php $doing_num=0; foreach($tasks as $task){ if($task['status']==1){$doing_num++;} }  ?>  Doing (<?php echo $doing_num; ?>)</span>
                        <span class="hr" data-trigger="todo"></span>
                        
                    </p>
                    <p id="modal-handler" data-trigger="done"> 
                        <i class="fa fa-square color-done" data-trigger="done"></i> 
                        <span data-trigger="done"><?php $done_num=0; foreach($tasks as $task){ if($task['status']==2){$done_num++;} }  ?> Done (<?php echo $done_num; ?>)</span>
                        <span class="hr" data-trigger="todo"></span>
                    </p>
                    
               </div>

               
               <div class="grid modal-container task-list  d-none" id="todo" >
                    <!-- <h1>Todo</h1> -->
                    <?php foreach($tasks as $task): ?>
                        <?php  if($task['status'] ==0):?>
                            <a href="<?php echo base_url('task/').$active_project_id.'/'.$task['id']; ?>" class="flex  flex-d-column task-card">
                                <p class="description"><?= $task['title'] ?></p>
                                <?php $subtasks = $this->sub_task_models->get_subtasks_model($task['id']); ?>
                                <small> <?php echo count($subtasks); ?> Subtask</small>
                            </a>
                        <?php  endif; ?>
                    <?php endforeach; ?>
               </div>

               <div class="grid modal-container task-list d-none" id="doing" >
                    <!-- <h1>Doing</h1> -->
                    <?php foreach($tasks as $task): ?>
                        <?php if($task['status'] ==1):?>
                            <a href="<?php echo base_url('task/').$active_project_id.'/'.$task['id']; ?>" class="flex  flex-d-column task-card">
                                <p class="description"><?= $task['title'] ?></p>
                                <?php $subtasks = $this->sub_task_models->get_subtasks_model($task['id']); ?>
                                <small> <?php echo count($subtasks); ?> Subtask</small>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <div class="grid modal-container task-list d-none" id="done">
                    <!-- <h1>Done</h1> -->
                    
                    <?php foreach($tasks as $task): ?>
                        <?php if($task['status'] ==2):?>
                            <a href="<?php echo base_url('task/').$active_project_id.'/'.$task['id']; ?>" class="flex  flex-d-column task-card">
                                <p class="description"><?= $task['title'] ?></p>
                                <?php $subtasks = $this->sub_task_models->get_subtasks_model($task['id']); ?>
                                <small> <?php echo count($subtasks); ?> Subtask</small>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- dashboard ends here -->
        </div>
        <!-- right section ends here -->

    </div>



<?php $this->load->view('projects/templates/footer'); ?>