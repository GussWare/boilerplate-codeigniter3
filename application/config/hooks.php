<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/userguide3/general/hooks.html
|
*/
$hook['post_controller_constructor'][] = array(
    'class'    => 'Language_Hook',
    'function' => 'load',
    'filename' => 'Language_Hook.php',
    'filepath' => 'hooks',
    'params'   => array()
);

$hook['pre_controller_constructor'][] = array(
    'class'    => 'Security_Hook',
    'function' => 'check',
    'filename' => 'Security_Hook.php',
    'filepath' => 'hooks',
    'params'   => array()
);

$hook['post_controller_constructor'][] = array(
    'class'    => 'Middelware_Hook',
    'function' => 'call',
    'filename' => 'Middelware_Hook.php',
    'filepath' => 'hooks',
    'params'   => array()
);