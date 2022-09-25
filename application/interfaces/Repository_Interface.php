<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

interface  Repository_Interface
{
    public function find_all();
    public function find_paginate();
    public function find_by_id();
    public function create();
    public function update();
    public function delete();
}

interface Repository_Batch_Interface 
{
    public function create_batch();
    public function update_batch();
    public function delete_batch();
}

/* End of file Repository_Interface.php */
