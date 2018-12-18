<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Public_Controller {

	/**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();

        // load the users model
        $this->load->model('users_model');
    }


    function login()
    {

        // print_r($this->session->userdata());
        // exit();
        if ($this->session->userdata('logged_in'))
        {
            $logged_in_user = $this->session->userdata('logged_in');
            if ($logged_in_user['is_admin'])
            {
                redirect(site_url().'admin','refresh');
            }
            else
            {
                redirect(site_url());
            }
        }

         // set form validation rules
        $this->form_validation->set_rules('username', 'Username is required', 'required|trim|max_length[256]');
        $this->form_validation->set_rules('password', 'Password is required', 'required|trim|max_length[72]|callback__check_login');


        if ($this->form_validation->run() == TRUE)
            {
                if ($this->session->userdata('redirect'))
                {
                    // redirect to desired page
//                    dump($this->session->userdata('redirect'), true);
                    $redirect = $this->session->userdata('redirect');
                    $this->session->unset_userdata('redirect');
                    redirect($redirect);
                }
                else
                {
                    $logged_in_user = $this->session->userdata('logged_in');
                    if ($logged_in_user['is_admin'])
                    {
                        // redirect to admin dashboard
                        redirect('admin');
                    }
                    else
                    {
//                        exit(site_url('profile'));
                        // redirect to landing page
                        redirect(site_url('profile'));
                    }
                }
            }


        // load views
        $data['content'] = $this->load->view('user/login', NULL, TRUE);
        $this->load->view($this->template, $data);
    }


    /**
     * Logout
     */
    function logout()
    {
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect('login');
    }



/**************************************************************************************
     * PRIVATE VALIDATION CALLBACK FUNCTIONS
     **************************************************************************************/



    /**
     * Verify the login credentials
     *
     * @param  string $password
     * @return boolean
     */
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

}
