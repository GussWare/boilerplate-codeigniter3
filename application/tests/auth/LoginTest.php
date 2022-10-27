<?php 
use PHPUnit\Framework\TestCase;

final class LoginTest extends TestCase 
{
    protected $CI;

    function __construct()
    {
        parent::__construct();

        $this->CI = & get_instance();
    }

    public function test_valid_login()
    {
        
    }
}