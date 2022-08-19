<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management App</title>
    <!-- links -->
    <link rel="stylesheet" href="<?= base_url('public/') ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url('public/') ?>assets/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <!-- sidebar start here -->
        <div class="sidebar" id="sidebar">
            <div id="closeBtn"><i class="fa fa-times"></i></div>
            <div class="branding">
                <a href="index.html"> <i class="fa fa-home"></i> <span>Welcome Jude</span> </a>
            </div>
            <div class="board-list">
                <label for="list-info" class="list-info">ALL BOARDS (1)</label>
                <a href="#" class="flex item active"> 
                    <i class="fa fa-folder-open"></i>
                    <p>Product Launch</p>
                    <i class="fa fa-trash" id="action-handler" data-url="del3" data-trigger="del-warning"></i>
                </a>
                <a href="#" class="flex item "> 
                    <i class="fa fa-folder"></i>
                    <p>Design App</p>
                    <i class="fa fa-trash" id="action-handler" data-url="del3" data-trigger="del-warning"></i>
                </a>
                <a href="change_password.html" class="flex item " > 
                    <i class="fa fa-wrench"></i>
                    <p>Change Password</p>
                </a>
                <div class="flex add-board" id="add-board-btn"> 
                    <i class="fa fa-plus" data-trigger="success"></i>
                    <p data-trigger="success">Create New Board</p>
                </div>

            </div>
        </div>
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
                        
                        <p><small>Product Launch <i class="fa fa-angle-double-right"></i></small> Product Logo</p>
                    </div>
                    <div class="flex actionBtn">
                        <button class="addtaskBtn" title="Add New Task to Current Board">  
                            <i class="fa fa-plus"></i> 
                            <span>Add New Task</span>
                        </button>
                        <!-- <span class="settingIcon" title="Settings">
                            <i class="fa fa-ellipsis-v"></i>
                        </span> -->
                        <div class="settingIcon">
                            <a href="login.html"> Logout</a>
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
                        <?= validation_errors()?>
                        <?= $this->session->flashdata('msg');?>
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
        <form class="flex flex-d-column board-form">
            <h3>Create New Board</h3>
            <div>
                <label for="">Title</label>
                <input type="text" placeholder=" e.g Launch Product">
                <input type="submit" value="Create Board" id="subBtn">
            </div>
        </form>
        <form class="flex flex-d-column task-form">
            <h3>Add New Task</h3>
            <div>
                <label for="">Title</label>
                <input type="text" placeholder=" e.g Take coffee break">
                <label for="description">Description</label>
                <textarea name="" id="" cols="30" rows="10" placeholder=" e.g Take coffee break"></textarea>
            </div>
            <input type="submit" value="Create Task" id="subBtn">
        </form>
    </div>

    <div id="del-warning">
        
        <div class="layer"></div>
        <div class="box">
            
            <h3>Are you sure you want to delete?</h3>
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