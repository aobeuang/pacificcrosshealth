<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Admin_Controller {

    /**
     * Constructor
     */
    function __construct()
    {
		parent::__construct();

		// load the users model
        $this->load->model('users_model');
    }

    function index(){

    	// get user profile
        $user_profile = $this->users_model->get_user($this->user['id']);
//        dump($user_profile, true);

	        // set content data
	        $content_data = array(
	            'cancel_url'        => base_url(),
	            'user'              => $user_profile,
	            'password_required' => FALSE
	        );

	        // load views
	        $data['content'] = $this->load->view('admin/profile', $content_data, TRUE);
	        $this->load->view($this->template, $data);

	    }


	    function changepassword(){
	    	// get user profile
        	$user_profile = $this->users_model->get_user($this->user['id']);

    		$this->form_validation->set_rules('npassword','New Password','required|trim');
    		$this->form_validation->set_rules('cpassword','Confirm Password','required|trim|matches[npassword]|callback__change_password');


    		if ($this->form_validation->run() == TRUE)
            {
            	$this->session->unset_userdata('logged_in');
            	$this->session->set_flashdata('message', 'Change password success, please login again');
		        redirect('login');
            }


        	 // set content data
	        $content_data = array(
	            'cancel_url'        => base_url(),
	            'user'              => $user_profile,
	            'password_required' => FALSE
	        );


        	// load views
	        $data['content'] = $this->load->view('admin/changepassword', $content_data, TRUE);
	        $this->load->view($this->template, $data);
	    }



	    /**************************************************************************************
     * PRIVATE VALIDATION CALLBACK FUNCTIONS
     **************************************************************************************/

    function _check_login($password)
    {
        $login = $this->users_model->login($this->input->post('username', TRUE), $password);

        if ($login)
        {
            $this->session->set_userdata('logged_in', $login);
            return TRUE;
        }

        $this->form_validation->set_message('_check_login', 'Invalid Username / Password');
        return FALSE;
    }

    public function _change_password() // we will load models here to check with database
	{
 
		$session_data = $this->session->userdata('logged_in');
		$npassword = $this->input->post('npassword');
		$cpassword = $this->input->post('cpassword');

		$id = $session_data['id'];

        $salt     = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), TRUE));
        $password = hash('sha512', $npassword . $salt);

        if( $npassword == $cpassword){

        	$update = $this->db->query("Update users SET 
        	password =" . $this->db->escape($password) . ", 
        	salt = " . $this->db->escape($salt) . " WHERE id = '$id' ")or die(mysql_error());

	        return TRUE;

        }

        $this->form_validation->set_message('_change_password', 'Can not change password');
        return FALSE;  

	}


}