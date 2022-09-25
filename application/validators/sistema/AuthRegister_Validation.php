<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'interfaces/Validation_Interface.php';

class AuthRegister_Validation implements Validation_Interface
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->library("form_validation");
    }

    public function validate()
    {
        $this->CI->form_validation->set_rules("name", lang("users_name"), array(
            'required',
            'max_length[255]',
        ));

        $this->CI->form_validation->set_rules("surname", lang("users_surname"), array(
            'required',
            'max_length[255]',
        ));

        $this->CI->form_validation->set_rules("username", lang("users_username"), array(
            'max_length[255]',
        ));

        $this->CI->form_validation->set_rules("email", lang("users_email"), array(
            'required',
            'valid_email',
            'max_length[255]',
        ));

        $this->CI->form_validation->set_rules("password", lang("users_password"), array(
            'required',
            'max_length[255]',
        ));

        $validate = $this->CI->form_validation->run();

        return $validate;
    }

    public function to_array()
    {
        return $this->CI->form_validation->to_array();
    }
}
