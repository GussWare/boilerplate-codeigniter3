<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'interfaces/Validation_Interface.php';

class Role_Validation implements Validation_Interface
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->library('form_validation');
    }

    public function validate()
    {
        $this->CI->form_validation->set_rules("name", lang("roles_name"), array(
            'required',
            'max_length(255)',
        ));

        $this->CI->form_validation->set_rules("slug", lang("roles_slug"), array(
            'required',
            'max_length(255)',
        ));

        $this->CI->form_validation->set_rules("description", lang("roles_description"), array(
            'required',
            'max_length(255)',
        ));

        $validate = $this->CI->form_validation->run();

        return $validate;
    }

    public function to_array()
    {
        return $this->CI->form_validation->to_array();
    }
}

/* End of file Role_Validation.php */
