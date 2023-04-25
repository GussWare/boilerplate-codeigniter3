<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Security_Hook
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function check()
    {
        $uri_segment = '';

        $role_id = 5;
    }
}
