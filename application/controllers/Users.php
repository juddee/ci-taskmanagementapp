<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Users extends CI_Controller
{
    public function __construct()
    {
            parent::__construct();
    }

    public function index()
    {
        $this->load->view('auths/login');
    }
    
    public function add_user()
    {
        $this->load->view('auths/signup');
        
    }
}