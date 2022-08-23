<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Sub_tasks extends CI_Controller 
{
    public function __construct()
    {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('project_models');
            $this->load->model('user_models');
            $this->load->model('task_models');
            $this->load->model('sub_task_models');
            $this->load->helper('cookie');  
    }
    function delete_task($id){
        $this->sub_task_models->delete_subtask_model($id);
        $this->custom_lib->get_last_url();
    }

    function check_task($id){
        $subtask_details['status']= 1;
        // unpdate
        $this->sub_task_models->update_subtask_model($id, $subtask_details);
        $this->custom_lib->get_last_url();
    }

    function uncheck_task($id){
        $subtask_details['status']= 0;
        $this->sub_task_models->update_subtask_model($id, $subtask_details);
        $this->custom_lib->get_last_url();
    }

    function create_subtask(){
        // set form rules
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Subtask title', 'required', array('required' => 'SubTask title required'));
        
        if($this->form_validation->run() === FALSE)
        {
            $this->session->set_flashdata('msg',  '<div class="flex" id="flash_box"> <small>'.validation_errors().'</small><i class="fa fa-times" id="flashBtn" onclick="hideMsg()"></i> </div>');
            $this->custom_lib->get_last_url();
        }else{
            $subtask_details['title']= $this->input->post('title');
            $subtask_details['task_id'] = $this->input->post('task_id');
            // print_r($subtask_details);
            // insert to db
            $result= $this->sub_task_models->create_subtask_model($subtask_details);
            if($result == TRUE){
                // display success
                $hmtl ='<div class="gif">
                    <img src="'.base_url('public/')  .'assets/Checkmark.gif" alt="">
                    <h3>Sub-Task added!</h3>
                </div>';
                $this->session->set_flashdata('msg',  $hmtl);
            }else{
                $this->session->set_flashdata('msg',  '<div id="flash_box"><small> Opps Error! Sub-Task was not added </small> <i class="fa fa-times" id="flashBtn" onclick="hideMsg()"></i></div>');
            }
            $this->custom_lib->get_last_url();
        }
    }


    function get_subtasks($project_id='',$task_id='')
    {
        $this->load->helper('form');
        // add protect_page library
        $this->custom_lib->protect_page();
        $data['title'] = "Tasks Overview";
        $load_bar = $this->load_sidebar($project_id);
        $data['active_sidebar'] = $load_bar['project_name'];
        $data['user_details'] = $this->user_models->get_user_details($_SESSION['user_id']);
        $data['projects'] = $this->project_models->get_projects();
        $data['tasks'] = $this->task_models->get_tasks_model($load_bar['project_id']);
        $data['task_details'] = $this->task_models->get_tasks_model($load_bar['project_id'],$task_id);
        $data['sub_tasks'] = $this->sub_task_models->get_subtasks_model($task_id);
        // set_last_url
        $this->custom_lib->set_last_url('task/'.$project_id.'/'.$task_id);
        $this->load->view('tasks/task_overview', $data);
    }

    function load_sidebar($id=''){
        // show_projects
        if($id==""){
            // get list of our project
            $projects = $this->project_models->get_projects();
            // set the first one as active_sidebar by default
            return array( 'project_name'=> $projects[0]['name'], 'project_id'=> $projects[0]['id'] );
        }else{

            $project = $this->project_models->get_projects($id);
            return array( 'project_name' => $project->name, 'project_id'=> $project->id) ;
        }
    
    }
}