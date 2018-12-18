<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Quote extends Public_Controller {

	function __construct(){
        parent::__construct();

        $this->load->model('plans_model');
        $this->load->helper('path');

        // set constants
        define('THIS_URL', base_url('quote'));

        $this->_redirect_url = THIS_URL;
    }

    function index(){

    	// load views
        $data['content'] = $this->load->view('quote/index', null, TRUE);
		$this->load->view($this->template, $data);
    }

    function step2(){

        // set form validation rules
        $this->form_validation->set_rules('txt-date', ' ', 'required');
        $this->form_validation->set_rules('txt-appName', ' ', 'required');
        $this->form_validation->set_rules('txt-name', ' ', 'required');
        $this->form_validation->set_rules('txt-phone', ' ', 'required');
        $this->form_validation->set_rules('txt-email', ' ', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {

                // load views
                $data['content'] = $this->load->view('quote/index', null, TRUE);
                $this->load->view($this->template, $data);

        } else {

            $age = calculate_age( $this->input->post('txt-date', TRUE) );
            $plans = $this->plans_model->get_plan_by_age( $age );

            $ageMonth = '';
            if( $age == 0 ){
                $from = new DateTime( $this->input->post('txt-date', TRUE) );
                $to   = new DateTime('today');  
                $ageMonth =  $from->diff($to)->m;
            }


            // load views
            $content_data = array(
                'age' => $age,
                'ageMonth' => $ageMonth,
                'appName' => $this->input->post('txt-appName', TRUE),
                'date' => $this->input->post('txt-date', TRUE),
                'name' => $this->input->post('txt-name', TRUE),
                'phone' => $this->input->post('txt-phone', TRUE),
                'email' => $this->input->post('txt-email', TRUE),
                'plans' => $plans,
                'cancel_url' => $this->_redirect_url
            );

            // // load views
            $data['content'] = $this->load->view('quote/step2',  $content_data, TRUE);
            $this->load->view($this->template, $data);

        }


    }

    function step3(){

        // // load views
        $data['content'] = $this->load->view('quote/step3',  NULL, TRUE);
        $this->load->view($this->template, $data);
    }

    function contact(){

        // // load views
        $data['content'] = $this->load->view('quote/contact',  NULL, TRUE);
        $this->load->view($this->template, $data);
    }


    function calculate(){
        $plan_id = $_POST['plan'];
        $age = $_POST['age'];
        $plan = $this->plans_model->get_plan( $plan_id );
        $get_plan_price = $this->plans_model->get_plan_price( $plan_id, $age);
        $plan_price = $get_plan_price['price'];

        // echo "<pre>";
        // print_r($get_plan_price);
        // echo "</pre>";

        if( $plan ){

            if( isset( $_POST['opd'] ) ){
                $no_opd = ( $plan_price * abs($plan['no_opd']) ) / 100;

                $plan_price = ( $_POST['opd'][0] ) ? $plan_price : $plan_price - $no_opd;
            }

            if( isset( $_POST['deduct'] ) ){
                $have_deduct = ( $plan_price * abs($_POST['deduct'][0]) ) / 100;
                $plan_price = ( $_POST['deduct'][0] !== 0 ) ? $plan_price - $have_deduct : $plan_price;
            }

            if( isset( $_POST['dental'] ) ){
                $plan_price = ( $_POST['dental'][0] ) ? $plan_price + $get_plan_price['dental'] : $plan_price;
            }

            if( isset( $_POST['vision'] ) ){
                $plan_price = ( $_POST['vision'][0] ) ? $plan_price + $get_plan_price['vision'] : $plan_price;
            }

            // vat
            $vat = $plan_price * 0.004;
            $plan_price = ceil($plan_price + $vat);

        }

        $result = [
            'price' => number_format( $plan_price, 0 )
        ];


        echo json_encode($result);
        exit();
    }


    function doQuote(){

        $error = false;
        $msg = "";

        // save quote
        $save = $this->plans_model->save_quote($this->input->post());

        if( $save ){
            $datas = $this->input->post();

            $opd = ( $datas['opd'][0] ) ? 'Yes' : 'No';

            $dental = 'Yes';
            $vision = 'Yes';
            if( isset($datas['dental'][0]) ){
                $dental = ( $datas['dental'][0] ) ? 'Yes' : 'No';
                
            } 
            if( isset($datas['vision'][0]) ){
                $vision = ( $datas['vision'][0] ) ? 'Yes' : 'No';
            }

            if( $datas['deduct'][0] == '0' ){
                $deduct = 'No';
            } elseif ( $datas['deduct'][0] == '15%' ) {
                $deduct = '20,000 THB/year';
            } elseif ( $datas['deduct'][0] == '25%' ) {
                $deduct = '40,000 THB/year';
            } elseif ( $datas['deduct'][0] == '32.50%' ) {
                $deduct = '100,000 THB/year';
            } elseif ( $datas['deduct'][0] == '40%' ) {
                $deduct = '200,000 THB/year';
            } elseif ( $datas['deduct'][0] == '50%' ) {
                $deduct = '300,000 THB/year';
            }

            // get plan
            $plan = $this->plans_model->get_plan( $this->input->post('plan', true) );

            $config = array(        
                'mailtype'  => 'html'
            );

            //  prepare email data
            $data = array(
             'age' => $this->input->post('age', true),
             'name' => $this->input->post('name', true),
             'appName' => $this->input->post('app_name', true),
             'phone' => $this->input->post('phone', true),
             'email' => $this->input->post('email', true),
             'birthday' => date('d F Y', strtotime( $this->input->post('date', true) )),
             'plan' => $plan['name'],
            'opd' => $opd,
            'dental' => $dental,
            'vision' => $vision,
            'deduct' => $deduct,
             'net_price' => $this->input->post('net_total', true),
            );

            if( $plan['name'] == 'Platinum'){
                $data['dental'] = 'Included';
                $data['vision'] = 'Included';
            } else if ( $plan['name'] == 'Gold' ){
                $data['vision'] = 'Included';
            }

            // prepare body
            $body = $this->load->view('emails/email_quote.php',$data, TRUE);
            $path = set_realpath('assets');

            // load lib
            $this->load->library('email', $config);

            // sendgrid init
            $this->email->initialize(array(
              'protocol' => 'smtp',
              'smtp_host' => 'fw.pacificcrosshealth.com',
              'smtp_timeout' => '7',
              'smtp_user' => '',
              'smtp_pass' => '',
              'smtp_port' => 25,
              'crlf' => "\r\n",
              'newline' => "\r\n"
            ));
 

            // $this->email->from('onlinequote@thaivisaprotect.com', 'Thai Visa Health Protect');
            // $this->email->to( $this->input->post('email', true) );
            // $this->email->bcc('onlinequote@thaivisaprotect.com'); 
            
            $this->email->from('onlinequote@thaivisaprotect.com', 'Thai Visa Health Protect');
            $this->email->to( $this->input->post('email', true) );
            $this->email->bcc(array('onlinequote@thaivisaprotect.com', 'jonathan@thaivisa.com'));
            // $this->email->bcc(array('Chotiwit.ks@gmail.com', 'bbird_ss@outlook.com', 'jonathan@thaivisa.com'));

            $this->email->subject('Thai Visa Health Protect');
            $this->email->message( $body );
            

            if( 'Platinum' == $plan['name'] ){
                $this->email->attach($path . 'Platinum.pdf');
            } else if( 'Gold' == $plan['name'] ){
                $this->email->attach($path . 'Gold.pdf');
            } else if( 'Silver' == $plan['name'] ){
                $this->email->attach($path . 'Silver.pdf');
            } else if( 'Bronze' == $plan['name'] ){
                $this->email->attach($path . 'Bronze.pdf');
            } else {
                $this->email->attach($path . 'demo_atten.pdf');
            }
            $this->email->attach($path . 'Application_of_Lifestyle_Series.pdf');


            // send mail
            $mail = $this->email->send();
                $this->session->set_flashdata('quote_success', 'Thai Visa Health Protect');
            if( !$mail ){
                $error = true;
                $msg = $this->email->print_debugger();
            } else {

                $this->session->set_flashdata('quote_success', 'Thai Visa Health Protect');

            }

        } else {
            $error = true;
            $msg = $save;
        }

        $result = [
            'error' => $error,
            'msg' => $msg
        ];

        echo json_encode($result);

        exit();
    }

}
?>