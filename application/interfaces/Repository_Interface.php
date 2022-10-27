<?php
defined('BASEPATH') or exit('No direct script access allowed');

interface  Repository_Interface
{
    public function find_all();
    public function find_pagination($filter, $options, $is_array);
    public function find_by_id($id);
    public function create($body);
    public function update($id, $body);
    public function delete($id);
}

interface Repository_Batch_Interface
{
    public function create_batch();
    public function update_batch();
    public function delete_batch();
}

/* End of file Repository_Interface.php */
