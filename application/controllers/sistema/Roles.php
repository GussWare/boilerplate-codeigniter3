<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Lukasoppermann\Httpstatus\Httpstatuscodes as HttpStatus;

class Roles extends MY_Controller
{
    protected $Role_Repository_Service;
    protected $Action_Repository_Service;

    public function __construct()
    {
        parent::__construct();

        $this->load->dto('sistema/Response_Dto');
        $this->load->dto('sistema/Role_Dto');
        $this->load->dto('sistema/Options_Dto');
        $this->load->model("sistema/Role_model");

        $this->load->service("sistema/roles/Role_Repository_Service");
        $this->load->service("sistema/actions/Action_Repository_Service");

        $this->load->library('Export_List', null, 'Export_List');
        $this->load->library('BasicTable', null, 'BasicTable');

        $this->load->helper("pagination_helper");

        $this->Role_Repository_Service = new Role_Repository_Service();
        $this->Action_Repository_Service = new Action_Repository_Service();
    }

    public function index()
    {
        $params = array(
            "title" => lang('roles_title'),
        );

        $this->layout->view("sistema/roles/index_view", $params);
    }

    public function form()
    {
        $action             = new Action_Dto();
        $action->idRole     = ($this->uri->segment(3)) ? $this->uri->segment(3) : null;

        $actions            = ($action->idRole) ? $this->Action_Repository_Service->find_all($action) : array();

        $params             = array();
        $params["title"]    = lang("actions_title");
        $params["actions"]  = $actions;

        $this->layout->view("sistema/roles/form_view", $params);
    }

    public function pagination()
    {
        $role_dto = $this->input->get_to_dto(new Role_Dto());
        $options_dto = $this->input->get_to_dto(new Options_Dto());

        $response = $this->Role_Repository_Service->find_paginate($role_dto, $options_dto);

        $this->response->send(HttpStatus::HTTP_OK, $response);
    }

    public function export(string $format = '')
    {
        $this->config->load('export_list');

        $role_dto = $this->input->post_to_dto(new Role_Dto());
        $options_dto = $this->input->post_to_dto(new Options_Dto());

        $columns = $this->config->item("export_list")["roles"];
        $data = $this->Role_model->find_all($role_dto, $options_dto);

        $export_init = array(
            "columns" => $columns,
            "data" => $data,
            "format" => $format,
        );

        $this->Export_List->initialize($export_init)->make();
    }

    public function create()
    {
        $role_dto = $this->input->post_to_dto(new Role_Dto());

        $this->Role_Repository_Service->create($role_dto);

        $response = new Response_Dto();
        $response->code = HttpStatus::HTTP_CREATED;

        $this->response->send(HttpStatus::HTTP_CREATED, $response);
    }

    public function update()
    {
        $id = $this->input->get("id");
        $role_dto = $this->input->post_to_dto(new Role_Dto());

        $this->Role_Repository_Service->update($id, $role_dto);

        $response = new Response_Dto();
        $response->code = HttpStatus::HTTP_ACCEPTED;
        $response->messages = $this->flash->success(lang('action_has_been_update'))->to_array();

        $this->response->send(HttpStatus::HTTP_ACCEPTED, $response);
    }

    public function delete()
    {
        $id = $this->input->post("id");

        $this->Role_Repository_Service->delete($id);

        $response = new Response_Dto();
        $response->code = HttpStatus::HTTP_ACCEPTED;
        $response->messages = $this->flash->success(lang('register_the_user_has_been_registered'))->to_array();

        $this->response->send(HttpStatus::HTTP_ACCEPTED, $response);
    }

    public function enabled()
    {
        $id = $this->input->post("id");

        $this->Role_Repository_Service->enabled($id);

        $response = new Response_Dto();
        $response->code = HttpStatus::HTTP_ACCEPTED;
        $response->messages = $this->flash->success(lang('register_the_user_has_been_registered'))->to_array();

        $this->response->send(HttpStatus::HTTP_ACCEPTED, $response);
    }

    public function disabled()
    {
        $id = $this->input->post("id");

        $this->Role_Repository_Service->disabled($id);

        $response = new Response_Dto();
        $response->code = HttpStatus::HTTP_ACCEPTED;
        $response->messages = $this->flash->success(lang('register_the_user_has_been_registered'))->to_array();

        $this->response->send(HttpStatus::HTTP_ACCEPTED, $response);
    }
}