<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . "interfaces/Repository_Interface.php";

class User_Repository_Service implements Repository_Interface
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->model('sistema/User_model');
    }

    public function find_paginate($filter,  $options,  $is_array = true)
    {
        $paginate = $this->CI->User_model->find_paginate($filter, $options, $is_array);

        return $paginate;
    }

    public function find_all()
    {
        $response = $this->CI->User_model->findAll();

        return $response;
    }

    public function find_by_id($id)
    {
        $user = $this->CI->User_model->findByID($id);

        return $user;
    }

    public function find_by_email($email)
    {
        $user = $this->CI->User_model->findByItem("email", $email);

        return $user;
    }

    public function find_by_username($username)
    {
        $user = $this->CI->User_model->findByItem("username", $username);

        return $user;
    }

    public function create($body)
    {
        $is_email_taken = $this->CI->User_model->is_email_taken($body->email);

        if ($is_email_taken) {
            throw new Error(lang('users_error_email_already_taken'));
        }

        $body->password     = $this->CI->security->get_password($body->password);
        $body->createdAt    = date("Y-m-d H:m:s");

        $user = $this->CI->User_model->save($body);

        return $user;
    }

    public function update($id, $body)
    {
        $user = $this->find_by_id($id);

        if (!$user) return null;

        $is_email_taken = $this->CI->User_model->is_email_taken($body->email, $id);

        if ($body->email !== '' && $is_email_taken) {
            throw new Error(lang('users_error_email_already_taken'));
        }

        $body->updatedAt = date("Y-m-d H:m:s");

        $this->CI->User_model->save($body, $id);

        $user = $this->find_by_id($id);

        return $user;
    }

    public function delete($id)
    {
        $user = $this->find_by_id($id);

        if (!$user) return null;

        $this->CI->User_model->where('id', $id);
        $this->CI->User_model->delete('users');

        return $user;
    }

    public function enabled($id)
    {
        $user = $this->find_by_id($id);

        if (!$user) return null;

        $this->CI->User_model->where('id', $id);
        $this->CI->User_model->update('users', array(
            'enabled' => SI
        ));

        return $user;
    }

    public function disabled($id)
    {
        $user = $this->find_by_id($id);

        if (!$user) return null;

        $this->CI->User_model->where('id', $id);
        $this->CI->User_model->update('users', array(
            'enabled' => NO
        ));

        return $user;
    }
}

/* End of file User_Repository_Service.php */