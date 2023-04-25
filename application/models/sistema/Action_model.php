<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Action_model extends MY_Model
{
    protected $table = 'actions';

    public function __construct()
    {
        parent::__construct();

        $this->loadTable($this->table);
    }

    public function find_all(Action_Dto $filter, Options_Dto $options, bool $is_arr = true)
    {
        $this->db->select("*");
        $this->db->from("actions as a");
        $this->db->join("roles AS r", "a.idRole = r.id");

        $this->db->where("a.idRole", $filter->idRole);

        if($filter->name) {
            $this->db->where("a.name", $filter->name);
        }

        if($filter->slug) {
            $this->db->where("a.slug", $filter->slug);
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
            $this->db->like("a.name", $options->search);
            $this->db->or_like("a.slug", $options->search);
            $this->db->or_like("a.description", $options->search);
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


    public function create_batch($data) 
    {
        $result = $this->db->insert_batch("actions", $data);

        return $result;
    }

    public function delete_by_module($module_id)
    {
        $this->db->where("idModule", $module_id);
        $this->db->delete("actions");
    }
}
