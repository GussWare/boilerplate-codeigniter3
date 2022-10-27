<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Lukasoppermann\Httpstatus\Httpstatuscodes as HttpStatus;

class Modules extends MY_Controller
{
    protected $Module_Repository_Service;

    public function __construct()
    {
        parent::__construct();

        $this->load->dto('sistema/Response_Dto');
        $this->load->dto('sistema/Module_Dto');
        $this->load->dto('sistema/Options_Dto');
        $this->load->model("sistema/Module_model");

        $this->load->service("sistema/modules/Module_Repository_Service");
        $this->load->service("sistema/actions/Action_Repository_Service");

        $this->load->library('Export_List', null, 'Export_List');
        $this->load->library('BasicTable', null, 'BasicTable');

        $this->load->helper("pagination_helper");

        $this->Module_Repository_Service = new Module_Repository_Service();
        $this->Action_Repository_Service = new Action_Repository_Service();
    }

    public function index()
    {
        $params = array(
            "title" => lang('modules_title'),
        );

        $this->layout->view("sistema/modules/index_view", $params);
    }

    public function form()
    {
        $action             = new Action_Dto();
        $action->idModule   = ($this->uri->segment(3)) ? $this->uri->segment(3) : null;

        $actions            = ($action->idModule) ? $this->Action_Repository_Service->find_all($action) : array();

        $params             = array();
        $params["title"]    = lang("modules_title");
        $params["actions"]  = $actions;

        $this->layout->view("sistema/modules/form_view", $params);
    }

    public function pagination()
    {
        $module_dto = $this->input->get_to_dto(new Module_Dto());
        $options_dto = $this->input->get_to_dto(new Options_Dto());

        $response = $this->Module_Repository_Service->find_pagination($module_dto, $options_dto);

        $this->response->send(HttpStatus::HTTP_OK, $response);
    }

    public function export(string $format = '')
    {
        $this->config->load('export_list');

        $module_dto = $this->input->post_to_dto(new Module_Dto());
        $options_dto = $this->input->post_to_dto(new Options_Dto());

        $columns = $this->config->item("export_list")["modules"];
        $data = $this->Module_model->find_all($module_dto, $options_dto);

        $export_init = array(
            "columns" => $columns,
            "data" => $data,
            "format" => $format,
        );

        $this->Export_List->initialize($export_init)->make();
    }

    public function create()
    {
        $module_dto = $this->input->post_to_dto(new Module_Dto());

        $this->Module_Repository_Service->create($module_dto);

        $response = new Response_Dto();
        $response->code = HttpStatus::HTTP_CREATED;

        $this->response->send(HttpStatus::HTTP_CREATED, $response);
    }

    public function update()
    {
        $id = $this->input->get("id");
        $module_dto = $this->input->post_to_dto(new Module_Dto());

        $this->Module_Repository_Service->update($id, $module_dto);

        $response = new Response_Dto();
        $response->code = HttpStatus::HTTP_ACCEPTED;
        $response->messages = $this->flash->success(lang('action_has_been_update'))->to_array();

        $this->response->send(HttpStatus::HTTP_ACCEPTED, $response);
    }

    public function delete()
    {
        $id = $this->input->post("id");

        $this->Module_Repository_Service->delete($id);

        $response = new Response_Dto();
        $response->code = HttpStatus::HTTP_ACCEPTED;
        $response->messages = $this->flash->success(lang('register_the_user_has_been_registered'))->to_array();

        $this->response->send(HttpStatus::HTTP_ACCEPTED, $response);
    }

    public function enabled()
    {
        $id = $this->input->post("id");

        $this->Module_Repository_Service->enabled($id);

        $response = new Response_Dto();
        $response->code = HttpStatus::HTTP_ACCEPTED;
        $response->messages = $this->flash->success(lang('register_the_user_has_been_registered'))->to_array();

        $this->response->send(HttpStatus::HTTP_ACCEPTED, $response);
    }

    public function disabled()
    {
        $id = $this->input->post("id");

        $this->Module_Repository_Service->disabled($id);

        $response = new Response_Dto();
        $response->code = HttpStatus::HTTP_ACCEPTED;
        $response->messages = $this->flash->success(lang('register_the_user_has_been_registered'))->to_array();

        $this->response->send(HttpStatus::HTTP_ACCEPTED, $response);
    }
}
