<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Users extends CI_Controller
{
    public function __construct()
    {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('user_models');
            $this->load->model('project_models');
            $this->load->helper('cookie');  
    }

    // login_user
    public function login_user()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email address','required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_error_delimiters('<small class="warningbox">', '</small>');
        // if user does  fail any of the validation_rule return and show associated error
        if($this->form_validation->run() === FALSE)
        {
            $this->load->view('auths/login');
        }else{
            // check if email registered
            $user_details = $this->user_models->get_user($this->input->post('email'));
            // check if hashed password match
            if(password_verify($this->input->post('password'),$user_details->password) === TRUE )
            {
                $cookie = array(
                    'name' => 'id',
                    'value' => $user_details->id,
                    'expire' => '86400'
                );
                $this->input->set_cookie($cookie);
                
                redirect(base_url('home'));
            }else{
                $this->session->set_flashdata('msg',  '<small class="warningbox"> Opps! Email or Password not correct </small>');
                redirect(base_url('login'));
            }
            
        }
    }
    
    // register user
    public function add_user()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        // set form_validation_rules
        $this->form_validation->set_rules('username', 'Username','required|is_unique[users.username]',
        array('is_unique' => 'Username already taken') );
        $this->form_validation->set_rules('email', 'Email Address','required|valid_email|is_unique[users.email]',
        array('is_unique' => 'Email address already registered'));
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]',
        array('matches' => 'Confirm password and password must match.'));
        $this->form_validation->set_error_delimiters('<small class="warningbox">', '</small>');
        // if user does  fail any of the validation_rule return and show associated error
        if($this->form_validation->run() === FALSE)
        {
            $this->load->view('auths/signup');
        }else{ //else user passes all validation rule then add_user 
            $user_details['username'] = $this->input->post('username');
            $user_details['email'] = $this->input->post('email');
            // hash user password
            $user_details['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            // run create_user_model
            $run_insert = $this->user_models->create_user_model($user_details);
            // check if user inserted
            if($run_insert == TRUE)
            {
                // display success
                $hmtl ='<div class="gif">
                            <img src="'.base_url('public/')  .'assets/Checkmark.gif" alt="">
                            <h3>Account Created</h3>
                        </div>';
                $this->session->set_flashdata('msg',  $hmtl);
            }else{ // else user not inserted then
                // throw error
                $this->session->set_flashdata('msg',  '<small class="warningbox"> Opps! Account not created</small>');
            }

            $this->load->view('auths/signup');
        }
        
    }

    // change password
    public function change_password()
    {
        // add protect_page library
        $this->custom_lib->protect_page();
        $data['title'] = "Dashboard";
        $data['active_sidebar'] = 'change-password';
        $data['user_details'] = $this->user_models->get_user_details($_SESSION['user_id']);
        $data['projects'] = $this->project_models->get_projects();
        // set_last_url
        $this->custom_lib->set_last_url('change-password');
        $this->load->helper('form');
        $this->load->library('form_validation');
        // set form rules
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('new_password', 'New password', 'required');
        $this->form_validation->set_rules('confirm_new_pass', 'Confirm password', 'required|matches[new_password]',
        array('matches' => 'Confirm new password and new password must match.'));
        $this->form_validation->set_error_delimiters('<small class="warningbox">', '</small>');
        // if user does  fail any of the validation_rule return and show associated error
        if($this->form_validation->run() === FALSE){
            $this->load->view('auths/change_password' , $data);
        }else{ //else user passes all validation rule then add_user 

            // check if current password correct
            if(password_verify($this->input->post('password'),$data['user_details']->password) === TRUE )
            {
                $user_details['password'] = password_hash($this->input->post('new_password'), PASSWORD_DEFAULT);
                $user_details['id']=$_SESSION['user_id'];
                $result = $this->user_models->update_user($user_details);
                if($result==TRUE){
                    // display success
                    $hmtl ='<div class="gif">
                        <img src="'.base_url('public/')  .'assets/Checkmark.gif" alt="">
                        <h3>Password Updated!</h3>
                    </div>';
                    $this->session->set_flashdata('msg',  $hmtl);
                    redirect(base_url('change-password'));
                }else{
                    
                    redirect(base_url('change-password'));
                }


            }else{
                $this->session->set_flashdata('msg',  '<small class="warningbox"> Opps! Current password not correct.</small>');
            }
            
            
        }
        
    }

    // log user out
    function logout_user()
    {
        // delete cookies & session
        delete_cookie('id');
        unset(
            $_SESSION['user_id'],
            $_SESSION['last_url']);
        
        $this->session->set_flashdata('msg',  '<small class="warningbox"> You have successfully logged out!</small>');
        redirect(base_url('login'));
        
    }



}
