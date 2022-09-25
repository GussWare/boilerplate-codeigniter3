<?php 

defined('BASEPATH') or exit('No direct script access allowed');
    
class Snippets extends MY_Controller {
    
    public function __construct()
    {
        parent::__construct();

        $this->load->helper("string");
    }
    
    public function index() 
    {
        $str = " Hola
        Mundo";
        $params = array(
            "title" => lang('snippet_title'),
            "str" => $str,
            "snippet" => spaces_to_character($str)
        );

        echo json_encode($params);exit;
    
        $this->layout->view("sistema/snippet/index_view", $params);
    }

    public function make() 
    {
        $snippet = $this->input->post("snippet");


    }
}