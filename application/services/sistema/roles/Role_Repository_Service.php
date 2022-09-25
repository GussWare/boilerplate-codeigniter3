<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role_Repository_Service
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->model("sistem/Role_model");
        $this->CI->load->viewmodel("sistema/roles/Role_Dto");
    }

    public function find_all()
    {
        $data = $this->CI->Role_model->findAll();

        return $data;
    }

    public function find_paginate(Role_Dto $filter, Options_Dto $options, bool $is_array = true)
    {
        $paginate = $this->CI->Role_model->find_paginate($filter, $options, $is_array);

        return $paginate;
    }

    public function find_by_id($id)
    {
        $data = $this->CI->Role_model->findById($id);

        return $data;
    }

    public function find_by_slug($slug)
    {
        $data = $this->CI->Role_model->findByItem('slug', $slug);

        return $data;
    }

    public function create(Role_Dto $role)
    {

    }

    public function update(int $id, Role_Dto $role)
    {

    }

    public function remove(int $id)
    {
        $response = $this->CI->Role_model->remove($id);

        return $response;
    }

    public function enabled(int $id)
    {
        $response = $this->CI->Role_model->enabled($id);

        return $response;
    }

    public function disabled(int $id)
    {
        $response = $this->CI->Role_model->disabled($id);

        return $response;
    }
}

/* End of file Role_Service.php */
