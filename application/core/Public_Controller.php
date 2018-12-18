<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Base Public Class - used for all public pages
 */
class Public_Controller extends MY_Controller {

    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();
        
        // declare main template
        $this->template = "../../htdocs/themes/default/template.php";

    }

}
