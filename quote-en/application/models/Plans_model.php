<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Plans_model extends CI_Model {

    /**
     * @vars
     */
    private $_db;


    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();

        // define primary table
        $this->_db = 'quote_plans';
    }


    function get_all()
    {
        // start building query
        $sql = "
            SELECT SQL_CALC_FOUND_ROWS *
            FROM {$this->_db}
            WHERE 1 = 1
            ORDER BY 
                CASE
                WHEN name LIKE 'Platinum%' THEN 1
                WHEN name LIKE 'Gold%' THEN 2
                WHEN name LIKE 'Silver%' THEN 3
                WHEN name LIKE 'Bronze%' THEN 4
                END ASC
        ";

        // execute query
        $query = $this->db->query($sql);

        // define results
        if ($query->num_rows() > 0)
        {
            $results['results'] = $query->result_array();
        }
        else
        {
            $results['results'] = NULL;
        }
        
        // return results
        return $results;
    }


    function get_plan($id = NULL){
        if($id){
            $sql = "
                SELECT *
                FROM {$this->_db}
                WHERE id = " . $this->db->escape($id) . "
            ";

            $query = $this->db->query($sql);

            if ($query->num_rows())
            {
                return $query->row_array();
            }
        }

        return FALSE;
    }

    function get_plan_by_age($age = NULL){
        if($age || $age === 0){
            $plans = $this->get_all();
            $results = [];

            foreach($plans['results'] as $p){

                if( $p['is_visible'] ){
                    $age_ranges = unserialize( $p['age_ranges'] );

                    foreach ($age_ranges as $ar) {
                       if( ($age >= $ar['from']) && ($age <= $ar['to']) ){

                            $results[] =  $p + $ar;
                       }
                    }
                }

            }

            return $results;
        }

        return FALSE;
    }

    function get_plan_price($id = NULL, $age = NULL){

        if( !empty($id) && ($age || $age === '0') ){
            $plan = $this->get_plan( $id );
            $result = 0;

            $age_ranges = unserialize( $plan['age_ranges'] );

            foreach ($age_ranges as $ar) {
               if( ($age >= $ar['from']) && ($age <= $ar['to']) ){

                    $result =  array(
                        'price' => $ar['price'],
                        'dental' => ( isset($ar['dental']) ) ? $ar['dental'] : 0,
                        'vision' => ( isset($ar['vision']) ) ? $ar['vision'] : 0,
                        );
               }
            }

            return $result;
        }

        return FALSE;
    }   


    function add_plan($data = array()){
        if($data){
            $ar = serialize( $data['plan']['ar'] );

            $records = array(
                'name' => $data['plan']['name'],
                'description' => $data['plan']['desc'], 
                'age_ranges' => $ar,
                'rates' => $data['plan']['rates'],
                'opd' => $data['plan']['opd'],
                'no_opd' => $data['plan']['no_opd'],
                'deduct_40k' => $data['plan']['deduct_40'],
                'deduct_100k' => $data['plan']['deduct_100'],
                'deduct_200k' => $data['plan']['deduct_200'],
                'deduct_300k' => $data['plan']['deduct_300'],
                'created' => date('Y-m-d H:i:s')
                );

            return $this->db->insert('quote_plans', $records);

        }
    }


    function edit_plan($data = array())
    {
        if ($data){

            $id = $data['id'];
            $ar = serialize( $data['plan']['ar'] );

            $records = array(
                'name' => $data['plan']['name'],
                'description' => $data['plan']['desc'], 
                'age_ranges' => $ar,
                'rates' => $data['plan']['rates'],
                'opd' => $data['plan']['opd'],
                'no_opd' => $data['plan']['no_opd'],
                'deduct_40k' => $data['plan']['deduct_40'],
                'deduct_100k' => $data['plan']['deduct_100'],
                'deduct_200k' => $data['plan']['deduct_200'],
                'deduct_300k' => $data['plan']['deduct_300']
                );

            $update = $this->db->update('quote_plans', $records, array('id' => $id));
            if($update){
                return TRUE;
            }    
        }

        return FALSE;
    }

    function delete_plan($id = NULL){
        if ($id){

            $delete = $this->db->delete('quote_plans', array('id' => $id));

            if ($delete)
            {
                return TRUE;
            }
        }

        return FALSE;
    }

    function update_visible($data){
        $id = $data['id'];
        $visible = $data['visible'];

        return $this->db->update('quote_plans', array( 'is_visible' => $visible ), array('id' => $id));
    }

    function save_quote($data){

        $plan = $this->plans_model->get_plan( $data['plan'] );

        $opd = $data['opd'][0];
        $deduct = 0;

        if(isset( $_POST['deduct'][0] )){
            $deduct = ( $_POST['deduct'][0] !== 0 ) ? $_POST['deduct'][0] : 0;
        }
        
        $dental = ( isset($data['dental']) ) ? $data['dental'][0] : 0;
        $vision = ( isset($data['vision']) ) ? $data['vision'][0] : 0;

        $plan_id = $data['plan'];
        $birthday = date('Y-m-d', strtotime( $data['date'] ));
        $name = $data['name'];
        $phone = $data['phone'];
        $email = $data['email'];
        $age = $data['age'];
        $net_totel = intval( $data['net_total'] );
        $app_name = $data['app_name'];

        $records = array(
            'plan_id' => $plan_id,
            'age' => $age,
            'app_name' => $app_name,
            'opd' => $opd, 
            'deduct' => $deduct,
            'dental' => $dental,
            'vision' => $vision,
            'netprice' => $net_totel,
            'birthday' => $birthday,
            'name' => $name,
            'telephone' => $phone,
            'email' => $email,
            'created' => date('Y-m-d H:i:s')
         );

        return $this->db->insert('quote_quotes', $records);

    }


}
