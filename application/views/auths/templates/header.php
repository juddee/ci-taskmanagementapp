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
    <div class="">
        <!-- sidebar start here -->

        <!-- sidebar ends here -->
        <!-- right section start here -->
        <div class="auth-content">
            <!-- header start here -->
            <header>
                <nav class="flex justify-content-between align-items-center">
                    <div class="flex align-items-center board-title">
                        <div id="land-brand">
                            <i class="fa fa-square"></i> 
                            <span>AnoderTask App</span> 
                        </div>

                        
                    </div>

                    <div class="flex actionBtn">
                        <!-- <button class="addtaskBtn" title="Add New Task to Current Board">  <i class="fa fa-plus"></i> <span>Add New Task</span></button> -->
                        <!-- <span class="settingIcon" title="Settings">
                            <i class="fa fa-ellipsis-v"></i>
                        </span> -->
                        <div class="settingIcon">
                            <a href="<?= base_url('signup') ?>"> Signup</a>
                        </div>
                        <div class="settingIcon">
                            <a href="<?= base_url('login') ?>"> Login</a>
                        </div>
                        <!-- <div class="settingIcon">
                            <a href="login.html">Logout</a>
                        </div> -->
                    </div>
                </nav>
            </header>
            <!-- header ends here -->