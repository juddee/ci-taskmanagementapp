<?php $this->load->view('auths/templates/header');?>

            <!-- dashboard start here -->
            <div class="dashboard">
                <div class="authform">
                    
                    <form method="post" class="flex flex-d-column ">
                        <h2>Login</h2>
                        <?= validation_errors()?> 
                        <?= $this->session->flashdata('msg');?>
                        <input type="email" name="email" placeholder=" Email Address">
                        <input type="password" name="password" placeholder=" Password">
                        <input type="submit" class="authbtn" value="Login">
                    </form>
                    <small><a href="<?= base_url('signup') ?>">Don't have an account yet? Click here to register</a></small>
                    <br><small class="quidebox">Login test details use Username: Johndoe  Password: 1234 </small>
                </div>
            </div>
            <!-- dashboard ends here -->
        </div>
        <!-- right section ends here -->
    </div>

    <?php $this->load->view('auths/templates/footer');?>