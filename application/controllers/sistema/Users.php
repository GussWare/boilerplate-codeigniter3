<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends MY_Controller {


    public function __construct()
    {
        parent::__construct();
    }

    public function index() 
    {
        $params = array(
            "title" => lang('users_title')
        );

        $this->layout->view("sistema/users/index_view", $params);
    }

    public function paginate() 
    {

    }

    public function form() {

    }

    public function create() {

    }

    public function update() {

    }

    public function remove() {

    }

    public function enabled() {

    }

    public function disabled() {}

    

}