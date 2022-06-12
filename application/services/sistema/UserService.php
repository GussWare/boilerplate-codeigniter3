<?php

class UserService
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->model('sistema/User_model');
    }

    public function find_paginate(User_ViewModel $filter, Options_ViewModel $options, $is_array = true)
    {
        $paginate = $this->CI->User_model->find_paginate($filter, $options, $is_array);
        
        return $paginate;
    }

    public function find_all()
    {
        $response = $this->CI->User_model->findAll();

        return $response;
    }

    public function find_by_id(int $id)
    {
        $user = $this->CI->User_model->findByID($id);

        return $user;
    }

    public function find_by_email(string $email)
    {
        $user = $this->CI->User_model->findByItem("email", $email);

        return $user;
    }

    public function find_by_username(string $username)
    {
        $user = $this->CI->User_model->findByItem("username", $username);

        return $user;
    }

    public function create(User_ViewModel $body)
    {
        $is_email_taken = $this->CI->User_model->is_email_taken($body->email);

        if($is_email_taken) {
            throw new Error();
        }

        $user = $this->CI->User_model->create($body);
        
        return $user;
    }

    public function update(int $id, User_ViewModel $body)
    {
    }

    public function remove(int $id)
    {
    }

    public function enabled(int $id)
    {
    }

    public function disabled(int $id)
    {
    }

    public function create_batch()
    {
    }

    public function update_batch()
    {
    }

    public function remove_batch()
    {
    }
}
