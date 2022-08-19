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
        function page_protect()
        {      
                
                if(!empty(get_cookie('id')) AND !isset($this->CI->session->user_id))
                {
                    // echo "Cookies not empty but session is empty, now let's set Session with cookie data and allow user to access page... <br>";
                    $newdata = array(
                            'user_id'  => get_cookie('id'),
                            'logged_in' => TRUE
                    );
                    
                    $this->CI->session->set_userdata($newdata);
                }
    
                if(empty(get_cookie('id')) AND !isset($this->CI->session->user_id))
                {
                    // echo "Cookies & Session are empty redirect to login";
                    // $this->add_user_log(array('title'=>'Access without login', 'remarks'=>'unauthorized access'));
                    redirect(base_url('login'));
                }
                if(empty(get_cookie('id')) AND isset($this->CI->session->user_id))
                {
                    // echo "Destroy session and redirect user to login";
                    // $this->add_user_log(array('title'=>'Access without login', 'remarks'=>'unauthorized access'));
                    redirect(base_url('login'));
                }                
        }


    }
