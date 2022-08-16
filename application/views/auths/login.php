<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management App</title>
    <!-- links -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
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
                            <a href="signup.html"> Signup</a>
                        </div>
                        <div class="settingIcon">
                            <a href="login.html"> Login</a>
                        </div>
                        <!-- <div class="settingIcon">
                            <a href="login.html">Logout</a>
                        </div> -->
                    </div>
                </nav>
            </header>
            <!-- header ends here -->

            <!-- dashboard start here -->
            <div class="dashboard">
                <div class="authform">
                    
                    <form method="post" class="flex flex-d-column ">
                        <h2>Login</h2>
                        <input type="text" placeholder=" Username">
                        <input type="password" placeholder=" Password">
                        <input type="submit" class="authbtn" value="Login">
                    </form>
                    <small><a href="signup.html">Don't have an account yet? Click here to register</a></small>
                    <br><small class="quidebox">Login test details use Username: Johndoe  Password: 1234 </small>
                </div>
            </div>
            <!-- dashboard ends here -->
        </div>
        <!-- right section ends here -->
    </div>

</body>
</html>