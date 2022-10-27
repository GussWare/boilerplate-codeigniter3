<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BasicTable
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->dto("sistema/BasicTable_Dto");
    }

    public function pagination(array $results, int $page, int $total_results, int $total_register,  int $total_pages, int $limit, string $sortBy) 
    {
        $basicTable = new BasicTable_Dto();
        $basicTable->results = $results;
        $basicTable->page = $page;
        $basicTable->totalPages = $total_pages;
        $basicTable->totalResults = $total_results;
        $basicTable->totalRegister = $total_register;
        $basicTable->limit = $limit;
        $basicTable->sortBy = $sortBy;

        return $basicTable;
    }
}

/* End of file BasicTable.php */
