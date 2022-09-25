<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index() 
    {
        $params = array(
            "title" => lang('dashboard_title')
        );

        $this->layout->view("sistema/dashboard/index_view", $params);
    }
}