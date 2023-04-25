<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Lukasoppermann\Httpstatus\Httpstatuscodes as HttpStatus;

class AuthRegister extends MY_Controller
{
    protected $Auth_Service;
    protected $User_Repository_Service;
    protected $AuthRegister_Validation;

    public function __construct()
    {
        parent::__construct();

        $this->load->dto('sistema/Response_Dto');
        $this->load->dto('sistema/User_Dto');
        $this->load->validator('sistema/AuthRegister_Validation');

        $this->load->service('sistema/users/Auth_Service');
        $this->load->service('sistema/users/User_Repository_Service');

        $this->Auth_Service = new Auth_Service();
        $this->User_Repository_Service = new User_Repository_Service();

        $this->AuthRegister_Validation = new AuthRegister_Validation();
    }

    public function index()
    {
        $params = array(
            "title" => lang('register_title'),
        );

        $this->layout->set_layout(LAYOUT_AUTH_FORM)->view("sistema/auth/register_view", $params);
    }

    public function register()
    {
        $response = new Response_Dto();
        
        $user = new User_Dto();

        $user = $this->input->post_to_dto($user);

        $user->idRole = ROLE_REGISTER_DEFAULT;

        $user = $this->User_Repository_Service->create($user);

        $this->session->set_flashdata('_MESSAGES', $this->flash->success(lang('register_the_user_has_been_registered'))->to_json());

        $this->response->send(HttpStatus::HTTP_OK, $response);
    }
}
