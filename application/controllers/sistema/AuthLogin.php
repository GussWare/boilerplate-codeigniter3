<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Lukasoppermann\Httpstatus\Httpstatuscodes as HttpStatus;

class AuthLogin extends MY_Controller
{
    protected $AuthLogin_Validation;
    protected $Auth_Service;

    public function __construct()
    {
        parent::__construct();

        $this->load->dto('sistema/Response_Dto');
        $this->load->validator('sistema/AuthLogin_Validation');
        $this->load->service('sistema/users/Auth_Service');

        $this->AuthLogin_Validation = new AuthLogin_Validation();
        $this->Auth_Service = new Auth_Service();
    }

    public function index()
    {
        $params = array(
            "title" => lang('auth_title'),
        );

        $this->layout->set_layout(LAYOUT_AUTH_SLIDER)->view("sistema/auth/login_view", $params);
    }

    public function login()
    {
        $response = new Response_Dto();

        $email      = $this->input->post("email");
        $password   = $this->input->post("password");

        $user       = $this->Auth_Service->login($email, $password);

        $this->session->set_userdata('USER', $user);

        $response->code = CODE_TYPE_SUCCESS;

        $this->response->send(HttpStatus::HTTP_OK, $response);
    }

    public function logout()
    {
        $this->Auth_Service->logout();

        redirect('auth/index');
    }
}
