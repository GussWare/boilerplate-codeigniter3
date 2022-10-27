<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Options_Dto
{
    public $order;
    public $sortBy = "";
    public $offset = 0;
    public $limit = PAGINATION_LIMIT_PER_PAGE;
    public $count;
    public $page = 1;
    public $not = array();
    public $search;
}
