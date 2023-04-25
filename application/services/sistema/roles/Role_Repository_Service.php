<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . "interfaces/Repository_Interface.php";

class Role_Repository_Service
{
    protected $CI;

    public function __construct()
    {
        $this->CI = & get_instance();

        $this->CI->load->dto('sistema/Role_Dto');
        $this->CI->load->dto('sistema/Options_Dto');
        $this->CI->load->model("sistem/Role_model");
        $this->CI->load->library("BasicTable", null, "BasicTable");
    }

    public function find_all()
    {
        $data = $this->CI->Role_model->findAll();

        return $data;
    }

    public function find_paginate($filter, $options, $is_array = true)
    {
        $limit = $options->limit;
        $options->offset = ($options->page - 1) * $options->limit;

        $total_register = $this->CI->Role_model->findCount();
        $total_pages =  ceil($total_register / $options->limit);

        $results = $this->CI->Role_model->find_all($filter, $options, $is_array);

        $options->limit = null;
        $options->count = true;

        $total_results = $this->CI->Role_model->find_all($filter, $options, $is_array);

        $pagination = $this->CI->BasicTable->pagination($results, $options->page, $total_register, $total_results, $total_pages, $limit, $options->sortBy);

        return $pagination;
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

    public function create(Role_Dto $body)
    {
        $is_name_taken = $this->Role_model->is_name_taken($body->name);
        
        if($is_name_taken) {
            throw new Error(lang('roles_error_name_already_taken')); 
        }

        $is_slug_taken = $this->Role_model->is_name_taken($body->slug);
        
        if($is_slug_taken) {
            throw new Error(lang('roles_error_slug_already_taken')); 
        }

        $body->createdAt = date("Y-m-d H:m:s");

        $result = $this->Role_model->save($body);

        return $result;
    }

    public function update(int $id, Role_Dto $body)
    {
        $role = $this->find_by_id($id);

        if(!$role) return null; 

        $is_name_taken = $this->Role_model->is_name_taken($body->name, $id);
        
        if($is_name_taken) {
            throw new Error(lang('roles_error_name_already_taken')); 
        }

        $is_slug_taken = $this->Role_model->is_slug_taken($body->slug, $id);
        
        if($is_slug_taken) {
            throw new Error(lang('roles_error_slug_already_taken')); 
        }

        $body->updateAt = date("Y-m-d H:m:s");

        $result = $this->Role_model->save($body, $id);

        return $result;
    }

    public function delete(int $id)
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
