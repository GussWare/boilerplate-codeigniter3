<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Lukasoppermann\Httpstatus\Httpstatuscodes as HttpStatus;

class Roles extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("sistema/Role_model");
        $this->load->dto('sistema/Role_Dto');
        $this->load->dto('sistema/Options_Dto');

        $this->load->library('Export_List', null, 'Export_List');
        $this->load->library('BasicTable', null, 'BasicTable');
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
        $params = array(
            "title" => lang('roles_title'),
        );

        $this->layout->view("sistema/roles/index_view", $params);
    }

    public function paginate()
    {
        $page = ($this->input->get('page')) ? $this->input->get('page') : 1;
        $role_vm = $this->input->get_to_dto(new Role_Dto());
        $options_vm = $this->input->get_to_dto(new Options_Dto());

        $results = $this->Role_model->find_all($role_vm, $options_vm);

        $options_vm->count = true;
        $totalResults = $this->Role_model->find_all($role_vm, $options_vm);

        $limit = 25;
        $totalPages = $totalResults / $limit;
        $sortBy = "name";

        $response = $this->BasicTable->paginate($results, $page, $totalResults, $totalPages, $limit, $sortBy);

        $this->response->send(HttpStatus::HTTP_OK, $response);
    }

    public function export(string $format = '')
    {
        $this->config->load('export_list');

        $role_vm = $this->input->post_to_dto(new Role_Dto());
        $options_vm = $this->input->post_to_dto(new Options_Dto());

        $columns = $this->config->item("export_list")["roles"];
        $data = $this->Role_model->find_all($role_vm, $options_vm);

        $export_init = array(
            "columns" => $columns,
            "data" => $data,
            "format" => $format,
        );

        $this->Export_List->initialize($export_init)->make();
    }

    public function create()
    {
        $role_vm = $this->input->post_vm(new Role_Dto());
    }

    public function update()
    {

    }

    public function remove()
    {

    }

    public function enabled()
    {

    }

    public function disabled()
    {

    }
}
