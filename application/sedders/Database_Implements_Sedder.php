<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Database_Implements_Sedder
{
    protected $context;

    public function implement($context, $total_rows = 10000)
    {
        $this->context = $context;    
        $this->context->sedder($total_rows);
    }
}

/* End of file Database_Implements_Sedder.php */
