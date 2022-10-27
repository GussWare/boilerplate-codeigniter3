<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Lukasoppermann\Httpstatus\Httpstatuscodes as HttpStatus;

class Sedder extends MY_Controller
{
    protected $Database_Sedder;

    public function __construct()
    {
        parent::__construct();

        $this->load->dto('sistema/Response_Dto');
        $this->load->sedder("Database_Sedder", null, "Database_Sedder");

        $this->Database_Sedder = new Database_Sedder();
    }

    public function index()
    {
        $this->Database_Sedder->sedder();

        $response = new Response_Dto();
        $response->code = HttpStatus::HTTP_OK;
        $response->messages = array();

        $this->response->send(HttpStatus::HTTP_OK, $response);
    }
}

/* End of file Sedder.php */
