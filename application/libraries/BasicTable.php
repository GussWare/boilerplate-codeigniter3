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

    public function paginate(array $results, int $page, int $totalResults,  int $totalPages, int $limit, string $sortBy) 
    {
        $basicTable = new BasicTable_Dto();
        $basicTable->results = $results;
        $basicTable->page = $page;
        $basicTable->totalPages = $totalPages;
        $basicTable->totalResults = $totalResults;
        $basicTable->limit = $limit;
        $basicTable->sortBy = $sortBy;

        return $basicTable;
    }
}

/* End of file BasicTable.php */
