<?php defined('BASEPATH') OR exit('No direct script access allowed');

function uri_string()
{
    $CI = get_instance();
//    $new_uri = substr(get_instance()->uri->uri_string(), 3);
    $new_uri = get_instance()->uri->uri_string();
//    dump($CI, true);
    $new_uri = str_replace('en/', '', $new_uri);
    $new_uri = str_replace('th/', '', $new_uri);
    return $new_uri;
}

function current_url()
{
    $CI =& get_instance();
    $new_uri = $CI->config->site_url($CI->uri->uri_string());
    $new_uri = str_replace('en/', '', $new_uri);
    $new_uri = str_replace('th/', '', $new_uri);
    return $new_uri;
}