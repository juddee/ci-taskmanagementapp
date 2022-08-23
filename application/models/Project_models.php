<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Project_models extends CI_Model
{
    // insert project to db
    function create_project_model($project_details)
    {
        // print_r($project_details); die('');
        $this->db->insert('projects', $project_details);
        
        if($this->db->affected_rows()==1)
        {
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    function get_projects($id=''){
        if($id==''){
            $query = $this->db->get_where('projects', array('user' => $_SESSION['user_id']));
            return $query->result_array();
        }else{
            $query = $this->db->get_where('projects', array('user' => $_SESSION['user_id'],'id'=>$id));
            return $query->row();
        }

    }

    function delete_project_model($id){
        // delete project form project tb 
        $this->db->delete('projects', array('id'=>$id));        
        // delete all tasks  under project and subtasks under projects
        return TRUE;

    }
    // check is_unique project name
    function is_unique_model($id,$name)
    {
        $query = $this->db->get_where('projects', array('user' => $id,'name'=>$name));
        return $query->result_array();
    }
}