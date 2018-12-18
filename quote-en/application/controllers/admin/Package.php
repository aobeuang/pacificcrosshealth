<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Package extends Admin_Controller {

    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();

        $this->load->database();

        // load library
        $this->load->library('form_validation');
        $this->load->library('session');

        // load the users model
        $this->load->model('plans_model');

        // load helper
        $this->load->helper('form');
        $this->load->helper('url');

        // set constants
        define('THIS_URL', base_url('admin/package'));

        $this->_redirect_url = THIS_URL;

    }


    function index()
    {
        $results = $this->plans_model->get_all();
        $plans = array();

        if(!empty($results['results'])){

            foreach ($results['results'] as $re){
               $plans[] = array(
                'id' => $re['id'],
                'plan_name' => $re['name'],
                'plan_description' => $re['description'],
                   'plan_visible' => $re['is_visible'],
                'age_ranges' => unserialize($re['age_ranges'])
               );
            }

        }

        // set content data
        $content_data = array(
            'plans'    => $plans,
            'this_url'   => THIS_URL,
            'password_required' => TRUE
        );


        // load views
        $data['content'] = $this->load->view('admin/package/list', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

    function add()
    {

        $this->form_validation->set_rules('plan[name]', 'Plan Name', 'required');
        $this->form_validation->set_rules('plan[desc]', 'Plan Description', 'required');


        if ($this->form_validation->run() == FALSE){

                $this->load->view('admin/package/form', NULL, TRUE);

        } else {

            // save the new user
            $saved = $this->plans_model->add_plan($this->input->post());

            if($saved){

                 $this->session->set_flashdata('message', 'Create plan success!');

            }

        }


        $plan['age_ranges'] = serialize(array(
            array('from' => 0, 'to' => 4, 'price' => 0, 'dental' => 0, 'vision' => 0),
            array('from' => 5, 'to' => 15, 'price' => 0, 'dental' => 0, 'vision' => 0),
            array('from' => 16, 'to' => 25, 'price' => 0, 'dental' => 0, 'vision' => 0),
            array('from' => 26, 'to' => 30, 'price' => 0, 'dental' => 0, 'vision' => 0),
            array('from' => 31, 'to' => 35, 'price' => 0, 'dental' => 0, 'vision' => 0),
            array('from' => 36, 'to' => 40, 'price' => 0, 'dental' => 0, 'vision' => 0),
            array('from' => 41, 'to' => 50, 'price' => 0, 'dental' => 0, 'vision' => 0),
            array('from' => 51, 'to' => 55, 'price' => 0, 'dental' => 0, 'vision' => 0),
            array('from' => 56, 'to' => 60, 'price' => 0, 'dental' => 0, 'vision' => 0),
            array('from' => 61, 'to' => 65, 'price' => 0, 'dental' => 0, 'vision' => 0),
            array('from' => 66, 'to' => 70, 'price' => 0, 'dental' => 0, 'vision' => 0),
        ));

        // set content data
        $content_data = array(
            'cancel_url'        => $this->_redirect_url,
            'plan'    => $plan,
            'user'              => NULL,
            'password_required' => TRUE
        );

        // load views
        $data['content'] = $this->load->view('admin/package/form', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }


    function edit($id = NULL){
        // make sure we have a numeric id
        if (is_null($id) OR ! is_numeric($id))
        {
            redirect($this->_redirect_url);
        }

        // get the data
        $plan = $this->plans_model->get_plan($id);

        // if empty results, return to list
        if (!$plan)
        {
            redirect($this->_redirect_url);
        }

        $this->form_validation->set_rules('plan[name]', 'Plan Name', 'required');
        $this->form_validation->set_rules('plan[desc]', 'Plan Description', 'required');

        if ($this->form_validation->run() == TRUE)
        {
            // save the changes
            $saved = $this->plans_model->edit_plan($this->input->post());

            if ($saved){
                $this->session->set_flashdata('message', 'Edit Plan Success');
            }

            // return to list and display message
            redirect($this->_redirect_url);
        }

        // set content data
        $content_data = array(
            'plan' => $plan,
            'plan_id' => $id,
        );

        // load views
        $data['content'] = $this->load->view('admin/package/form', $content_data, TRUE);
        $this->load->view($this->template, $data);

    }


    function delete($id = NULL){
        // make sure we have a numeric id
        if ( ! is_null($id) OR ! is_numeric($id))
        {
            // get plan details
            $plan = $this->plans_model->get_plan($id);

            if ($plan){

                // delete the plan
                $delete = $this->plans_model->delete_plan($id);

                if ($delete){
                    $this->session->set_flashdata('message', 'Delete Plan Success');
                }
                else{
                    $this->session->set_flashdata('error', 'Cannot Delet Plan!');
                }
            }
            else{
                $this->session->set_flashdata('error', 'Plan not found!');
            }
        }
        else{
            $this->session->set_flashdata('error', 'Pland id is Requried');
        }

        // return to list and display message
        redirect($this->_redirect_url);
    }

    function updateVisibie(){
        $update = $this->plans_model->update_visible($this->input->post());

        echo $update;

        exit();
    }

}
