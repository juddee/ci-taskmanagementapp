<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Projects extends CI_Controller
{
    public function __construct()
    {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('sub_task_models');
            $this->load->model('task_models');
            $this->load->model('project_models');
            $this->load->model('user_models');
            $this->load->helper('cookie');  
    }

    function index()
    {
        // add protect_page library
        $this->custom_lib->protect_page();
        $data['title'] = "Dashboard";
        $data['active_sidebar'] = 'Project Dashboard';
        $data['user_details'] = $this->user_models->get_user_details($_SESSION['user_id']);
        $data['projects'] = $this->project_models->get_projects();
        $this->custom_lib->set_last_url('home');
        $this->load->view("projects/home", $data);
    }
    
    function create_project()
    {
        // form validation
        // set form rules
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('project_name', 'Project title', 'required|callback_check_project_name', array('required' => 'Project title required'));
        if($this->form_validation->run() === FALSE){
            
            $this->session->set_flashdata('msg',  '<div class="flex" id="flash_box"> <small>'.validation_errors().'</small><i class="fa fa-times" id="flashBtn" onclick="hideMsg()"></i> </div>');
            // get_last_url
            $this->custom_lib->get_last_url();
        }else {
            $project_details['name'] = $this->input->post("project_name");
            $project_details['user'] = $_SESSION['user_id'];
            $project_details['created_at'] = date('Y-m-d');
            // insert to db
            $create_project = $this->project_models->create_project_model($project_details);
            if($create_project ==TRUE)
            {
                // display success
                $hmtl ='<div class="gif">
                    <img src="'.base_url('public/')  .'assets/Checkmark.gif" alt="">
                    <h3>Project Created! Let start this..</h3>
                </div>';
                $this->session->set_flashdata('msg',  $hmtl);

            }else{
                $this->session->set_flashdata('msg',  '<div id="flash_box"><small> Opps Error! Project not created </small> <i class="fa fa-times" id="flashBtn" onclick="hideMsg()"></i></div>');
            }
            $this->custom_lib->get_last_url();
        }

    }

    function delete_project($id)
    {
        // get all task with project_id 
        $tasks = $this->task_models->get_tasks_model($id);
            //loop and run task delete
            foreach($tasks as $task){
                $this->task_models->delete_task_model($task['id']);
            }
            //then run project delete
            $respond = $this->project_models->delete_project_model($id);

        // display success
        $hmtl ='<div class="gif">
            <img src="'.base_url('public/')  .'assets/Checkmark.gif" alt="">
            <h3>Project Deleted! One down</h3>
        </div>';
        $this->session->set_flashdata('msg',  $hmtl);
        redirect(base_url('home'));
    }

    function check_project_name(){
        $result = $this->project_models->is_unique_model($_SESSION['user_id'], $this->input->post('project_name'));
        // if project name don't already exist with user_id
        if(empty($result)){
            return TRUE;
        }else{
            $this->form_validation->set_message('check_project_name', 'Opps! Project name already exist');
            return FALSE;
        }
    }

    function load_project($id)
    {
        // add protect_page library
        $this->custom_lib->protect_page();
        $data['title'] = "Dashboard";
        $load_bar = $this->load_sidebar($id);
        $data['active_sidebar'] = $load_bar['project_name'];
        $data['user_details'] = $this->user_models->get_user_details($_SESSION['user_id']);
        $data['projects'] = $this->project_models->get_projects();
        $data['active_project_id'] =$load_bar['project_id'];
        $data['tasks'] = $this->task_models->get_tasks_model($load_bar['project_id']);
        // set_last_url
        $this->custom_lib->set_last_url('home/'.$id);
        $this->load->view('projects/dashboard', $data);
    }

    function load_sidebar($id='')
    {
        $project = $this->project_models->get_projects($id);
        return array( 'project_name' => $project->name, 'project_id'=> $project->id) ;
    }

}