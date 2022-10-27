<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Role_model extends MY_Model
{
    protected $table = 'roles';

    public function __construct()
    {
        parent::__construct();

        $this->loadTable($this->table);
    }

    public function find_all(Role_Dto $filter, Options_Dto $options, bool $is_arr = true)
    {
        $this->db->select("*");
        $this->db->from("roles as r");

        if($filter->name) {
            $this->db->where("name", $filter->name);
        }

        if($filter->slug) {
            $this->db->where("slug", $filter->slug);
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

        if($options->search) {
            $this->db->like("name", $options->search);
            $this->db->or_like("slug", $options->search);
            $this->db->or_like("description", $options->search);
        }

        if ($options->count) {
            return $this->db->count_all_results();
        }

        $query = $this->db->get();
        $data = array();

        if ($this->db->error()["code"] === 0) {
            if ($query->num_rows() > 0) {
                $data = ($is_arr) ? $query->result_array() : $query->result();
            }
        }

        return $data;
    }

    public function is_name_taken($name, $id = null)
    {
        $this->db->from($this->table);
        $this->db->where("name", $name);

        if ($id !== null) {
            $this->db->where_not_in("id", $id);
        }

        $conta = $this->db->count_all_results();

        return ($conta > 0) ? true : false;
    }

    public function is_slug_taken($slug, $id = null)
    {
        $this->db->from($this->table);
        $this->db->where("slug", $slug);

        if ($id !== null) {
            $this->db->where_not_in("id", $id);
        }

        $conta = $this->db->count_all_results();

        return ($conta > 0) ? true : false;
    }
}
