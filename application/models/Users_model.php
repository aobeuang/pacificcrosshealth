<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

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
        $this->_db = 'quote_users';
    }

    /**
     * Get specific user
     *
     * @param  int $id
     * @return array|boolean
     */
    function get_user($id = NULL)
    {
        if ($id)
        {
            $sql = "
                SELECT *
                FROM {$this->_db}
                WHERE id = " . $this->db->escape($id) . "
                    AND deleted = '0'
            ";

            $query = $this->db->query($sql);

            if ($query->num_rows())
            {
                return $query->row_array();
            }
        }

        return FALSE;
    }

    function login($username = NULL, $password = NULL)
    {
        if ($username && $password)
        {
            $sql = "
                SELECT
                    *
                FROM {$this->_db}
                WHERE (username = " . $this->db->escape($username) . "
                        OR email = " . $this->db->escape($username) . ")
                    AND status = '1'
                    AND deleted = '0'
                LIMIT 1
            ";

            $query = $this->db->query($sql);
            if ($query->num_rows())
            {
                
                $results = $query->row_array();
                $salted_password = hash('sha512', $password);
                // echo $results['password']."<br/>";
                // echo $salted_password."<br/>";
                if ($results['password'] == $salted_password)
                {
                    unset($results['password']);
                    unset($results['salt']);

                    return $results;
                }
            }
        }

        return FALSE;
    }


    function change_password($datas = NULL){

        if($datas){

        }
        
    }

}