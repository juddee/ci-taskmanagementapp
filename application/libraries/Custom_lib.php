<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    class Custom_lib 
    {


        protected $CI;
        // We'll use a constructor, as you can't directly call a function
        // from a property definition.
        public function __construct()
        {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();

        }

        function get_last_url()
        {
            redirect($this->CI->session->last_url);
        }

        function set_last_url($url){
            $newurl = array(
                'last_url'  => base_url($url),
                'logged_in' => TRUE
            );
            $this->CI->session->set_userdata($newurl);
        }

        function protect_page()
        {      
                // if cookie not empty but session is empty
                if(get_cookie('id') !="" AND $this->CI->session->user_id =="" ){
                    echo "<br> cookie not empty";
                    echo "<br> session is empty";
                    $newlog = array(
                        'user_id'  => get_cookie('id'),
                        'logged_in' => TRUE
                    );
                    $this->CI->session->set_userdata($newlog);
                    return  TRUE;
                }
                // if cookie is empty
                if(get_cookie('id')=="")
                {
                    redirect(base_url('login'));
                    return  FALSE;
                }
                // if both cookie and session empty
                if(get_cookie('id') =="" AND $this->CI->session->user_id =="")
                {
                    redirect(base_url('login'));
                    return  FALSE;
                }
                // if cookie empty but session is not
                if(get_cookie('id') =="" AND $this->CI->session->user_id !="" )
                {
                    redirect(base_url('login'));
                    return  FALSE;
                }
       
        }

        

    }
