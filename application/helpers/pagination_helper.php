<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('get_select_limit_pagination')) {
    function get_select_limit_pagination()
    {
        $arr = array(
            "10" => "10",
            "20" => "20",
            "30" => "30",
            "50" => "50",
            "100" => "100",
            "200" => "200",
            "300" => "300",
            "400" => "400",
            "500" => "500"
        );

        return $arr;
    }
}

/* End of file pagination_helper.php */
