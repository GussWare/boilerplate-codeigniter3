<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Database_Factory {

    protected $CI;

    public function __construct()
    {
        $this->CI = & get_instance();
    }

    public function factory($class_name)
    {
        $this->CI->load->sedder($class_name);

        $object_factory = new $class_name();
        
        if(!$object_factory || (!$object_factory instanceof $class_name)){
            throw new Exception('Database_Factory - La fabrica no pudo crear el objeto de la clase a exportar.');
        } 

        return $object_factory;
    }

}

/* End of file Database_Factory.php */
