<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Module_model extends MY_Model
{
    protected $table = 'modules';

    public function __construct()
    {
        parent::__construct();

        $this->loadTable($this->table);
    }

    public function find_all(Module_Dto $filter, Options_Dto $options, bool $is_arr = true)
    {
        $this->db->select("*");
        $this->db->from("modules AS m");

        if($filter->id) {
            $this->db->where("m.id", $filter->id);
        }

        if($filter->name) {
            $this->db->where("m.name", $filter->name);
        }

        if($filter->slug) {
            $this->db->where("m.slug", $filter->slug);
        }

        if(is_numeric($filter->enabled)) {
            $this->db->where("m.enabled", $filter->enabled);
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
            $this->db->like("m.name", $options->search);
            $this->db->or_like("m.slug", $options->search);
            $this->db->or_like("m.description", $options->search);
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
