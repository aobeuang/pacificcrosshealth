<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {


    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();

    }


    /**
     * Dashboard
     */
    function index()
    {
        // load views
        $data['content'] = $this->load->view('admin/dashboard', NULL, TRUE);

        $this->load->view($this->template, $data);
    }

}
