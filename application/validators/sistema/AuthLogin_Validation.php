<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'interfaces/Validation_Interface.php';

class AuthLogin_Validation implements Validation_Interface
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->library("form_validation");
    }

    public function validate()
    {
        $this->CI->form_validation->set_rules("email", lang("auth_email"), array(
            'required',
            'valid_email',
            'min_length[3]',
            'max_length[254]'
        ));

        $this->CI->form_validation->set_rules("password", lang("auth_password"), array(
            'required',
            'min_length[8]',
            'max_length[254]'
        ));

        $validate = $this->CI->form_validation->run();

        return $validate;
    }

    public function to_array()
    {
        return $this->CI->form_validation->to_array();
    }
}
