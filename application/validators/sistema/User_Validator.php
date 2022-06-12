<?php

defined('BASEPATH') or exit('No direct script access allowed');


class User_Validator
{

    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->library('form_validation');
    }


    public function validate()
    {
        $this->CI->form_validation->set_rules();

        $validate = $this->CI->form_validation->run();

        if (!$validate) {
            $errors = $this->CI->form_validation->error_array();
        }

        return $validate;
    }
}
