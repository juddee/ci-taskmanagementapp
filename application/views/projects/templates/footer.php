    <div class="add-board-modal" id="board-modal">
        <div class="overlay" id="overlay"></div>
        <form class="flex flex-d-column board-form" method="post" action="<?php echo base_url('add-project')?>">
            <h3>Create New Project</h3>
            <div>
                <label for="title" >Title</label>
                <input type="text" placeholder=" e.g Launch Product" name="project_name">
                <input type="submit" value="Create Project" class="subBtn">
            </div>
        </form>
        <form class="flex flex-d-column task-form" method="post" action="<?php echo base_url('add-task')?>">
            <h3>Add New Task</h3>
            <div>
                <label for="">Title</label>
                <input type="hidden" name="project" value="<?php foreach($projects as $project){
                    if($project['name'] == $active_sidebar){ echo $project['id']; }
                }?>" >
                <input type="text" placeholder=" e.g Take coffee break" name="title">
                <label for="description">Description</label>
                <textarea name="description" id="" cols="30" rows="10" placeholder=" e.g Take break, read or finish up sideproject "></textarea>

            </div>
            <input type="submit" value="Create Task" class="subBtn">
        </form>
        
    </div>
    
    <div id="del-warning">
        
        <div class="layer"></div>
        <div class="box">
            
            <h3>Are you sure you want to delete?</h3>
            <button  id="modal-target">Yes</button>
        </div>

    </div>
    
    <div id="task-del-warning">
    
        <div class="layer"></div>
        <div class="box">
            
            <h3>Are you sure you want to delete? </h3>
            <small>All sub-tasks under this task will be deleted along</small>
            <button  id="modal-target">Yes</button>
        </div>

    </div> 

    <div id="project-del-warning">
    
        <div class="layer"></div>
        <div class="box">
            
            <h3>Are you sure you want to delete? </h3>
            <small>All tasks and sub-tasks under this project will be deleted along</small>
            <button  id="modal-target">Yes</button>
        </div>

    </div> 

    <div id="check-warning">
        <div class="layer"></div>
        <div class="box">
            <h3>Update Status?</h3>  
            <button id="updateBtn">Yes</button>
        </div>
    </div>

<script src="<?= base_url('public/') ?>js/script.js"></script>
    <script src="<?= base_url('public/') ?>js/handleActive.js"></script>
    <script src="<?= base_url('public/') ?>js/modal.js"></script>
</body>
</html>