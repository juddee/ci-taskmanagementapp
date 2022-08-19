<?php $this->load->view('auths/templates/header');?>
            <!-- header ends here -->

            <!-- dashboard start here -->

            <div class="dashboard">
                <div class="authform">
                    <form method="post" class="flex flex-d-column ">
                        <h2>Signup</h2>
                        <br>
                        <?= validation_errors()?>
                        <?= $this->session->flashdata('msg');?>
                        <!-- <small class="warningbox">Login test details use Username: Johndoe  Password: 1234 </small> -->
                        <input type="text" name="username" placeholder=" Username">
                        <input type="email" name="email" placeholder=" Email Address">
                        <input type="password" name="password" placeholder=" Password">
                        <input type="password" name="confirm_password" placeholder=" Confirm Password">
                        <input type="submit" class="authbtn" value="Signup">
                    </form>
                    <small><a href="<?= base_url('login') ?>">Already have an account yet? Click here to login</a></small>
                    <br><small class="quidebox">Login test details use Username: Johndoe  Password: 1234 </small>
                </div>
            </div>
            <!-- dashboard ends here -->
        </div>
        <!-- right section ends here -->
    </div>

<?php $this->load->view('auths/templates/footer');?>