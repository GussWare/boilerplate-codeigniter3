<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Lukasoppermann\Httpstatus\Httpstatuscodes as HttpStatus;

class AuthForGotPassword extends MY_Controller
{
    protected $AuthForgot_Validation;
    protected $Auth_Service;

    public function __construct()
    {
        parent::__construct();

        $this->load->dto('sistema/Response_Dto');
        $this->load->validator('sistema/AuthForgot_Validation');
        $this->load->service('sistema/users/Auth_Service');

        $this->AuthForgot_Validation = new AuthForgot_Validation();
        $this->Auth_Service = new Auth_Service();
    }

    public function index()
    {
        $params = array(
            "title" => lang('forgot_title'),
        );

        $this->layout->set_layout(LAYOUT_AUTH_FORM)->view("sistema/auth/forgot_view", $params);
    }

    public function forgotPassword()
    {
        $response = new Response_Dto();

        if ($this->AuthForgot_Validation->validate() === false) {
            $response->code = HttpStatus::HTTP_BAD_REQUEST;
            $response->messages = $this->AuthForgot_Validation->to_array();

            $this->response->send(HttpStatus::HTTP_BAD_REQUEST, $response);

            return;
        }

        $email = $this->input->post("email");

        $this->Auth_Service->forgot_password($email);

        $this->session->set_flashdata('_MESSAGES', $this->flash->success(lang('forgot_sent_to_recover_pass')));

        $this->response->send(HttpStatus::HTTP_NO_CONTENT);
    }
}
