<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . "interfaces/Repository_Interface.php";

class Action_Repository_Service
{
    protected $CI;
    protected $idRole;

    public function __construct()
    {
        $this->CI = & get_instance();

        $this->CI->load->dto('sistema/Action_Dto');
        $this->CI->load->dto('sistema/Options_Dto');
        $this->CI->load->model("sistema/Action_model");
    }

    public function find_all(Action_Dto $action)
    {
        $data = $this->CI->Action_model->findAll($action);

        return $data;
    }

    public function create_batch($data) 
    {
        $this->CI->Action_model->create_batch($data);
    }
}

/* End of file Role_Service.php */
