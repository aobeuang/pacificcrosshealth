<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Outputs an array in a user-readable JSON format
 *
 * @param array $array
 */
if ( ! function_exists('display_json'))
{
    function display_json($array)
    {
        $data = json_indent($array);

        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');

        echo $data;
    }
}


/**
 * Convert an array to a user-readable JSON string
 *
 * @param array $array - The original array to convert to JSON
 * @return string - Friendly formatted JSON string
 */
if ( ! function_exists('json_indent'))
{
    function json_indent($array = array())
    {
        // make sure array is provided
        if (empty($array))
            return NULL;

        //Encode the string
        $json = json_encode($array);

        $result        = '';
        $pos           = 0;
        $str_len       = strlen($json);
        $indent_str    = '  ';
        $new_line      = "\n";
        $prev_char     = '';
        $out_of_quotes = true;

        for ($i = 0; $i <= $str_len; $i++)
        {
            // grab the next character in the string
            $char = substr($json, $i, 1);

            // are we inside a quoted string?
            if ($char == '"' && $prev_char != '\\')
            {
                $out_of_quotes = !$out_of_quotes;
            }
            // if this character is the end of an element, output a new line and indent the next line
            elseif (($char == '}' OR $char == ']') && $out_of_quotes)
            {
                $result .= $new_line;
                $pos--;

                for ($j = 0; $j < $pos; $j++)
                {
                    $result .= $indent_str;
                }
            }

            // add the character to the result string
            $result .= $char;

            // if the last character was the beginning of an element, output a new line and indent the next line
            if (($char == ',' OR $char == '{' OR $char == '[') && $out_of_quotes)
            {
                $result .= $new_line;

                if ($char == '{' OR $char == '[')
                {
                    $pos++;
                }

                for ($j = 0; $j < $pos; $j++)
                {
                    $result .= $indent_str;
                }
            }

            $prev_char = $char;
        }

        // return result
        return $result . $new_line;
    }
}


/**
 * Save data to a CSV file
 *
 * @param array $array
 * @param string $filename
 * @return bool
 */
if ( ! function_exists('array_to_csv'))
{
    function array_to_csv($array = array(), $filename = "export.csv")
    {
        $CI = get_instance();

        // disable the profiler otherwise header errors will occur
        $CI->output->enable_profiler(FALSE);

        if ( ! empty($array))
        {
            // ensure proper file extension is used
            if ( ! substr(strrchr($filename, '.csv'), 1))
            {
                $filename .= '.csv';
            }

            try
            {
                // set the headers for file download
                header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
                header("Cache-Control: no-cache, must-revalidate");
                header("Pragma: no-cache");
                header("Content-type: text/csv");
                header("Content-Description: File Transfer");
                header("Content-Disposition: attachment; filename={$filename}");

                $output = @fopen('php://output', 'w');

                // used to determine header row
                $header_displayed = FALSE;

                foreach ($array as $row)
                {
                    if ( ! $header_displayed)
                    {
                        // use the array keys as the header row
                        fputcsv($output, array_keys($row));
                        $header_displayed = TRUE;
                    }

                    // clean the data
                    $allowed = '/[^a-zA-Z0-9_ %\|\[\]\.\(\)%&-]/s';
                    foreach ($row as $key => $value)
                    {
                        $row[$key] = preg_replace($allowed, '', $value);
                    }

                    // insert the data
                    fputcsv($output, $row);
                }

                fclose($output);

            }
            catch (Exception $e) {}
        }

        exit;
    }
}


/**
 * Generates a random password
 *
 * @return string
 */
if ( ! function_exists('generate_random_password'))
{
    function generate_random_password()
    {
        $characters = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array();
        $alpha_length = strlen($characters) - 1;

        for ($i = 0; $i < 8; $i++)
        {
            $n = rand(0, $alpha_length);
            $pass[] = $characters[$n];
        }

        return implode($pass);
    }
}


/**
 * Retrieves list of language folders
 *
 * @return array
 */
if ( ! function_exists('get_languages'))
{
    function get_languages()
    {
        $CI = get_instance();

        if ($CI->session->languages)
        {
            return $CI->session->languages;
        }

        $CI->load->helper('directory');

        $language_directories = directory_map(APPPATH . '/language/', 1);

        if ( ! $language_directories)
        {
            $language_directories = directory_map(BASEPATH . '/language/', 1);
        }

        $languages = array();
        foreach ($language_directories as $language)
        {
            if (substr($language, -1) == "/" || substr($language, -1) == "\\")
            {
                $languages[substr($language, 0, -1)] = ucwords(str_replace(array('-', '_'), ' ', substr($language, 0, -1)));
            }
        }

        $CI->session->languages = $languages;

        return $languages;
    }
}

function parse_menu_to_array($plain_menu) {
    $CI = get_instance();
    $CI->load->model('content_model');
    $result = array();
    $prev_root = true;
    $current_index = 0;
    $prev_index = 0;
    $tmp = explode("\n", $plain_menu);
    $prefix_submenu = "****";
    foreach($tmp as $index=>$value){
        if ($index == 0 && strpos($value, $prefix_submenu) !== false) { // ignore if found "****" sub menu at first row
            continue;
        }

        $tmp_value = trim($value);
        
        if (strpos($value, $prefix_submenu) !== false) { // for sub menu
            if ($prev_root) {
                $prev_index = $current_index-1;
            }

            $result[$prev_index]['values'][] = array(
                'slug'=>str_replace($prefix_submenu, '', $tmp_value),
                'title'=>$CI->content_model->get_title(str_replace($prefix_submenu.'p/', '', $tmp_value))
            );

            $prev_root = false;
        } else { // for root menu
            $result[$current_index]['slug'] = $tmp_value;
            $result[$current_index]['title'] = $CI->content_model->get_title(str_replace('p/', '', $tmp_value));
            $current_index++;
            $prev_root = true;
        }


        // echo trim($v).'<br/>';
        // if ($i > 0 && strpos($v, '--') !== false) {
        //     if ($prev_root) {
        //         $prev_index = $i-1;
        //     }
        //     // echo 'replace-->>'.str_replace('--p/', '', trim($v)).'<br/>';
        //     $result[$prev_index]['values'][] = array(
        //         'slug'=>trim(str_replace('--', '', $v)),
        //         'title'=>$CI->content_model->get_title(str_replace('--p/', '', trim($v)))
        //     );
        //     $prev_root = false;
        // } else { // root
            
        //     // echo 'replace----->>'.str_replace('p/', '', trim($v)).'<br/>';
        //     $result[$current_index]['slug'] = trim($v);
        //     $result[$current_index]['title'] = $CI->content_model->get_title(str_replace('p/', '', trim($v)));
        //     $prev_root = true;
        //     $current_index++;
        // }
        //echo '---------------------------<br/>';
    }
    // echo '<pre>';
    // var_dump($result);
    return $result;
}

function parse_menu_to_string($array_menu = NULL) {
    // $array_menu = 'a:5:{i:0;a:2:{s:4:"slug";s:7:"company";s:5:"title";a:2:{s:7:"english";s:7:"Company";s:4:"thai";s:39:"รายชื่อบริษัท";}}i:1;a:2:{s:4:"slug";s:9:"promotion";s:5:"title";a:2:{s:7:"english";s:9:"Promotion";s:4:"thai";s:27:"โปรโมชั่น";}}i:2;a:3:{s:4:"slug";s:16:"bussiness-chance";s:5:"title";a:2:{s:7:"english";s:16:"Bussiness chance";s:4:"thai";s:42:"โอกาสทางธุรกิจ";}s:6:"values";a:4:{i:0;a:2:{s:4:"slug";s:14:"marketing-plan";s:5:"title";b:0;}i:1;a:2:{s:4:"slug";s:6:"profit";s:5:"title";b:0;}i:2;a:2:{s:4:"slug";s:12:"member-level";s:5:"title";b:0;}i:3;a:2:{s:4:"slug";s:14:"start-business";s:5:"title";b:0;}}}i:7;a:2:{s:4:"slug";s:5:"about";s:5:"title";a:2:{s:7:"english";s:8:"About us";s:4:"thai";s:36:"เกี่ยวกับเรา";}}i:8;a:2:{s:4:"slug";s:7:"contact";s:5:"title";b:0;}}';
    // $tmp = unserialize($array_menu);
    $result = array();
    $prefix_submenu = "****";
    foreach ($array_menu as $key => $value) {
        if (isset($value['values']) && is_array($value['values'])) {
            $result[] = $value['slug']; 
            foreach ($value['values'] as $key2 => $value2) {
                $result[] = $prefix_submenu.$value2['slug'];
            }
        } else {
            $result[] = $value['slug'];    
        }
        
    }
    return implode("\n", $result);
}

function uploaded_url() {

}

function uploaded_path() {

}

function dump($o, $exit = false) {
    echo '<pre>';
    var_dump($o);
    if ($exit) exit();
}

