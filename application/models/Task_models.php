<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Task_models extends CI_Model
{

    function update_task_model($id, $task_details){
        $this->db->update('tasks', $task_details, 'id ='.$id.'');
        if($this->db->affected_rows()==1)
        {
            return true;
        }else
        {
            return false;
        }
    }

    function delete_task_model($id){
        // delete task form tasks tb 
        $this->db->delete('tasks', array('id'=>$id));
        // delete all sub-task under tasks
        $this->db->delete('sub_tasks', array('task_id'=>$id));
        return TRUE;
    }

    // get tasks
    function get_tasks_model($project_id, $task_id=''){
        if($task_id==''){
            $query = $this->db->get_where('tasks', array('project_id' => $project_id ) );
            return $query->result_array();
        }else{
            $query = $this->db->get_where('tasks', array('project_id' => $project_id, 'id'=>$task_id) );
            return $query->row();
        }

    }

    // insert project to db
    function create_task_model($task_details)
    {
        $this->db->insert('tasks', $task_details);
        
        if($this->db->affected_rows()==1)
        {
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

     // check is_unique project name
     function is_unique_model($project_id, $title)
     {
         $query = $this->db->get_where('tasks', array('project_id' => $project_id,'title'=>$title));
         return $query->result_array();
     }
}