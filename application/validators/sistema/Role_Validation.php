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

    }

    public function to_array()
    {
        return $this->CI->form_validation->to_array();
    }
}

/* End of file Role_Validation.php */
