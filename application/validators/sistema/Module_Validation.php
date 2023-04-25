<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'interfaces/Validation_Interface.php';

class Module_Validation implements Validation_Interface
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->library('form_validation');
    }

    public function validate()
    {
        $this->CI->form_validation->set_rules("name", lang("modules_name"), array(
            'required',
            'max_length(255)',
        ));

        $this->CI->form_validation->set_rules("slug", lang("modules_slug"), array(
            'required',
            'max_length(255)',
        ));

        $this->CI->form_validation->set_rules("description", lang("modules_description"), array(
            'required',
            'max_length(255)',
        ));

        $this->CI->form_validation->set_rules("modules_actions", lang("modules_actions"), array());

        $validate = $this->CI->form_validation->run();

        return $validate;
    }

    public function to_array()
    {
        return $this->CI->form_validation->to_array();
    }
}

/* End of file Module_Validation.php */
