<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Overwriting the timezones function to include Arizona timezone
 */

function calculate_age($date){

    # object oriented
    $from = new DateTime($date);
    $to   = new DateTime('today');
    
    $age = $from->diff($to)->y;
    return $age;

}
