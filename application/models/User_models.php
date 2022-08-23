<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class User_models extends CI_Model
{
    // register_user
    function create_user_model($user_details)
    {
        
        $this->db->insert('users', $user_details);
        
        if($this->db->affected_rows()==1)
        {
            return true;
        }
        else{
            return false;
        }
    }

    function get_user_details($id)
    {
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row();
    }

    function get_user($email)
    {
        $query = $this->db->get_where('users', array('email' => $email));
        return $query->row();
    }

    function update_user($user_details)
    {
        $this->db->update('users', $user_details, 'id ='.$user_details['id'].'');
        if($this->db->affected_rows()==1)
        {
            return true;
        }else
        {
            return false;
        }
    }
}