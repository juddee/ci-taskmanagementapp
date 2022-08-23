<?php $this->load->view('projects/templates/header'); ?>
    <div class="container">
        <!-- sidebar start here -->
        <?php $this->load->view('auths/templates/sidebar'); ?>
        <!-- sidebar ends here -->
        <!-- right section start here -->
        <div class="main-content">
            <!-- header start here -->
            <header>
                <nav class="flex justify-content-between align-items-center">
                    <div class="flex align-items-center board-title">
                        <div id="toggleBtn">
                            <i class="fa fa-bars"></i>
                        </div>
                        
                        <p><small><?php echo $active_sidebar?></p>
                    </div>
                    <div class="flex align-items-center actionBtn">
                        <span  class="profIcon"><?= $user_details->username?></span> 
                        <div class="settingIcon">
                            <a href="<?php echo base_url('logout');?>"> Logout</a>
                        </div>
                    </div>

                </nav>
            </header>
            <!-- header ends here -->

            <!-- dashboard start here -->
            <div class="dashboard">
                <div class="authform">
                    <form method="post" class="flex flex-d-column ">
                        <h2>Change Password</h2>
                        <?php echo validation_errors(); ?>
                        <?php echo $this->session->flashdata('msg');?>
                        <input type="password" name="password" placeholder=" Enter current password">
                        <input type="password" name="new_password" placeholder=" Enter new password">
                        <input type="password" name="confirm_new_pass" placeholder=" Confirm new password">
                        <input type="submit" class="authbtn" value="Save">
                    </form>
                </div>
            </div>
            <!-- dashboard ends here -->
        </div>
        <!-- right section ends here -->

    </div>


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

    <script src="<?php echo base_url('public/js/pg_script.js');?>"></script>
</body>
</html>

