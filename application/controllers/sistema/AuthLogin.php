<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Lukasoppermann\Httpstatus\Httpstatuscodes as HttpStatus;

class AuthLogin extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $params = array(
            "title" => lang('users_title')
        );

        $this->layout->set_layout(LAYOUT_AUTH)->view("sistema/auth/login_view", $params);
    }

    public function login()
    {
        $response = json_encode(array("message" => "Hola que hace"));

        $this->output->set_content_type(OUTPUT_CONTENT_TYPE)
            ->set_status_header(HttpStatus::HTTP_INTERNAL_SERVER_ERROR)
            ->set_output($response);
    }
}
