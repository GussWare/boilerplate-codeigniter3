<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout
{

    private $layout;
    private $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        
        $this->layout = LAYOUT_DEFAULT . LAYOUT_SISTEMA;
    }

    public function set_layout($layout = '')
    {
        $this->layout = $layout;

        return $this;
    }

    public function view($view = '', $params = array()) 
    {
        $params_layout = array("content_layout" => '');

        if($view) {
            $params_layout['content_layout'] = $this->ci->load->view($view, $params, true);
        }

        $this->ci->load->view($this->layout, $params_layout);

        return $this;
    }
}
