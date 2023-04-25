<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Lukasoppermann\Httpstatus\Httpstatuscodes as HttpStatus;

class Middelware_Hook
{
    protected $CI;

    protected $middelwares;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->config->load('middelwares');

        $this->middelwares = $this->CI->config->item('middelwares');
    }

    public function call()
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
            $controller = $this->CI->uri->segment(1);
            $action = $this->CI->uri->segment(2);

            $uri_segment = $controller;

            if ($action)
                $uri_segment .= "/" . $action;

            if (isset($this->middelwares["validations"][$uri_segment])) {
                $class = $this->middelwares["validations"][$uri_segment];
                $this->CI->load->validator('sistema/' . $class);

                $validator = new $class();
                $is_valid = $validator->validate();

                if (!$is_valid) {
                    $this->CI->load->dto('sistema/Response_Dto');

                    $response = new Response_Dto();
                    $response->code = CODE_TYPE_ERROR;
                    $response->messages = $validator->to_array();

                    header( 'HTTP/1.1 400 BAD REQUEST' );
                    header('Content-Type: application/json; charset=utf-8');

                    echo json_encode($response);

                    exit();
                }
            }
        }
    }
}
