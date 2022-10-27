<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . "interfaces/Sedder_Interface.php";
require_once APPPATH . "sedders/Database_Factory.php";
require_once APPPATH . "sedders/Database_Implements_Sedder.php";

class Database_Sedder implements Sedder_Interface
{
    protected $CI;
    protected $sedders;
    protected $Database_Factory;
    protected $Database_Implements_Sedder;

    public function __construct()
    {
        $this->CI = & get_instance();
        $this->CI->config->load('sedders');

        $this->sedders = $this->CI->config->item('sedders');

        $this->Database_Factory = new Database_Factory();
        $this->Database_Implements_Sedder = new Database_Implements_Sedder();
    }

    public function sedder()
    {
        foreach ($this->sedders as $key => $sedder) {
            $context = $this->Database_Factory->factory($sedder);
            $this->Database_Implements_Sedder->implement($context);
        }
    }
}

/* End of file Database_Sedder.php */
