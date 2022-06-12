<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function find_all($filter, $options, $is_arr = true)
    {
        $this->db->select("*");
        $this->db->join("roles AS r", "u.idRole = r.idRole", "inner");
        $this->db->from("users AS u");
        $this->db->where("r.enabled", OK);

        if ($filter->id) {
            $this->db->like("u.id", $filter->id);
        }

        if ($filter->name) {
            $this->db->like("u.name", $filter->name);
        }

        if ($filter->surname) {
            $this->db->like("u.surname", $filter->surname);
        }

        if ($filter->username) {
            $this->db->like("u.username", $filter->username);
        }

        if ($filter->email) {
            $this->db->where("u.email", $filter->email);
        }

        if ($filter->isEmailVerified) {
            $this->db->where("u.isEmailVerified", $filter->isEmailVerified);
        }

        if ($filter->enabled) {
            $this->db->where("u.enabled", $filter->enabled);
        }

        if ($filter->idRole) {
            $this->db->where("u.idRole", $filter->idRole);
        }

        if ($options->limit && $options->offset) {
            $this->db->limit($options->limit, $options->offset);
        } else {
            if ($options->limit) {
                $this->db->limit($options->limit);
            }
        }

        if ($options->sortBy && $options->order) {
            $this->db->order_by($options->order . ' ' . $options->sortBy);
        }

        if (is_array($options->not) && count($options->not) > 0) {
            foreach ($options->not as $key => $value) {
                $this->db->where_not_in($key, $value);
            }
        }

        if ($options->count) {
            return $this->db->count_all_results();
        }

        $query = $this->db->get();
        $data = array();

        if (!$this->db->_error_message()) {
            if ($query->num_rows() > 0) {
                $data = ($is_arr) ? $query->result_array() : $query->result();
            }
        }
        return $data;
    }

    public function is_email_taken(string $email, int $id = null)
    {
        $this->db->from("users");
        $this->db->where("email", $email);

        if ($id) {
            $this->db->where_not_in("id", $id);
        }

        $conta = $this->db->count_all_results();

        return ($conta > 0) ? true : false;
    }
}
