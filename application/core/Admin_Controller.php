<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Base Admin Class - used for all administration pages
 */
class Admin_Controller extends MY_Controller {

    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();

        // must be logged in
        if ( ! $this->user)
        {
            if (current_url() != base_url())
            {
                //store requested URL to session - will load once logged in
                $data = array('redirect' => current_url());
                $this->session->set_userdata($data);
            }

            redirect('user/login');
        }

        // make sure this user is setup as admin
        if ( ! $this->user['is_admin'])
        {
            redirect(base_url());
        }

        // declare main template
        $this->template = "../../htdocs/themes/admin/template.php";

    }

}
