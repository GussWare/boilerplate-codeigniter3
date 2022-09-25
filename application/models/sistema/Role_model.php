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

        if ($this->db->error()["code"] === 0) {
            if ($query->num_rows() > 0) {
                $data = ($is_arr) ? $query->result_array() : $query->result();
            }
        }

        return $data;

    }
}
