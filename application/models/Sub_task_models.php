<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Sub_task_models extends CI_Model
{

    function delete_subtask_model($id)
    {
        // delete project form project tb 
        $this->db->delete('sub_tasks', array('id'=>$id));
    }

    function update_subtask_model($id, $subtask_details)
    {
        $this->db->update('sub_tasks', $subtask_details, 'id ='.$id.'');
        if($this->db->affected_rows()==1)
        {
            return true;
        }else
        {
            return false;
        }
    }

    function get_subtasks_model($task_id)
    {
        $query = $this->db->get_where('sub_tasks', array('task_id' => $task_id ) );
        return $query->result_array();
    }
    
    function create_subtask_model($subtask_details)
    {
        $this->db->insert('sub_tasks', $subtask_details);
        if($this->db->affected_rows()==1)
        {
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
}