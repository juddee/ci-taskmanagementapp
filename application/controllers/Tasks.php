<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Tasks extends CI_Controller
{
    public function __construct()
    {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('task_models');
            $this->load->helper('cookie');  
    }

    function edit_task()
    {
        // set form rules
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Task title', 'required', array('required' => 'Task title required'));
        // $this->form_validation->set_rules('title', 'Task title', 'required|callback_check_task_title', array('required' => 'Task title required'));
        $this->form_validation->set_rules('description', 'Task description', 'required', array('required' => 'Task description required'));

        if($this->form_validation->run() === FALSE)
        {
            $this->session->set_flashdata('msg',  '<div class="flex" id="flash_box"> <small>'.validation_errors().'</small><i class="fa fa-times" id="flashBtn" onclick="hideMsg()"></i> </div>');
            $this->custom_lib->get_last_url();
        }else{
            $task_details['title']= $this->input->post('title');
            $task_details['description']= $this->input->post('description');
            if($this->input->post('status') == 'todo'){
                $task_details['status'] = 0;
            }
            if($this->input->post('status') == 'doing'){
                $task_details['status'] = 1;
            }
            if($this->input->post('status') == 'done'){
                $task_details['status'] = 2;
            }
            // update to db
            $update= $this->task_models->update_task_model($this->input->post('task_id'), $task_details);
            if($update == TRUE){
                // display success
                $hmtl ='<div class="gif">
                    <img src="'.base_url('public/')  .'assets/Checkmark.gif" alt="">
                    <h3>Task Updated!</h3>
                </div>';
                $this->session->set_flashdata('msg',  $hmtl);
            }else{
                $this->session->set_flashdata('msg',  '<div id="flash_box"><small> Opps Error! Task was not updated </small> <i class="fa fa-times" id="flashBtn" onclick="hideMsg()"></i></div>');
            }
            $this->custom_lib->get_last_url();
        }
    }

    function delete_task($id)
    {
        $respond = $this->task_models->delete_task_model($id);
        // display success
        $hmtl ='<div class="gif">
            <img src="'.base_url('public/')  .'assets/Checkmark.gif" alt="">
            <h3>Task Deleted! One down</h3>
        </div>';
        $this->session->set_flashdata('msg',  $hmtl);
        redirect(base_url('home'));
    }

    function create_task()
    {
        // set form rules
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Task title', 'required', array('required' => 'Task title required'));
        // $this->form_validation->set_rules('title', 'Task title', 'required|callback_check_task_title', array('required' => 'Task title required'));
        $this->form_validation->set_rules('description', 'Task description', 'required', array('required' => 'Task description required'));

        if($this->form_validation->run() === FALSE)
        {
            $this->session->set_flashdata('msg',  '<div class="flex" id="flash_box"> <small>'.validation_errors().'</small><i class="fa fa-times" id="flashBtn" onclick="hideMsg()"></i> </div>');
            $this->custom_lib->get_last_url();
        }else{
            $task_details['title']= $this->input->post('title');
            $task_details['description']= $this->input->post('description');
            $task_details['project_id'] = $this->input->post('project');
            // insert to db
            $result= $this->task_models->create_task_model($task_details);
            if($result == TRUE){
                // display success
                $hmtl ='<div class="gif">
                    <img src="'.base_url('public/')  .'assets/Checkmark.gif" alt="">
                    <h3>Task added!</h3>
                </div>';
                $this->session->set_flashdata('msg',  $hmtl);
            }else{
                $this->session->set_flashdata('msg',  '<div id="flash_box"><small> Opps Error! Task was not added </small> <i class="fa fa-times" id="flashBtn" onclick="hideMsg()"></i></div>');
            }
            $this->custom_lib->get_last_url();
        }
    }

    function check_task_title()
    {
        $result = $this->task_models->is_unique_model($this->input->post('project'),$this->input->post('title'));
        // if project name don't already exist with user_id
        if(empty($result)){
            return TRUE;
        }else{
            $this->form_validation->set_message('check_project_name', 'Opps! Project name already exist');
            return FALSE;
        }
    }

}