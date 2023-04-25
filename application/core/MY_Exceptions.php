<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Exceptions extends CI_Exceptions
{
    protected $CI;

    public function __construct()
    {
        parent::__construct();

        $this->CI = &get_instance();
    }

    public function show_error($heading, $message, $template = 'error_general', $status_code = 500)
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
            echo json_encode(array(
                "code" => $status_code,
                "messages" => $message
            ));
        } else {
            parent::show_error($heading, $message, $template, $status_code);
        }

        exit(1);
    }

    public function show_exception($exception)
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
            echo json_encode(array(
                "code" => CODE_TYPE_ERROR,
                "messages" => $exception->getMessage()
            ));
        } else {
            parent::show_exception($exception);
        }

        exit(1);
    }
}
