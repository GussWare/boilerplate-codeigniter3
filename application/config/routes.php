<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'dashboard/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['auth']               = 'AuthLogin/index';
$route['auth/index']["GET"]  = 'AuthLogin/index';
$route['auth/login']["POST"] = 'AuthLogin/login';

$route['auth/forgot-password']["GET"]  = 'AuthForGotPassword/index';
$route['auth/forgot-password']["POST"] = 'AuthForGotPassword/forgotPassword';

$route['auth/register']["GET"]  = 'AuthRegister/index';
$route['auth/register']["POST"] = 'AuthRegister/register';

$route['snippet/index']["GET"] = 'Snippets/index';


$route['dashboard']["GET"]  = 'dashboard/index';

$route['roles'] = 'Roles/index';
$route['roles/index']["GET"] = 'Roles/index';
$route['roles/index']["pagination"] = 'Roles/pagination';
$route['roles/form']["GET"] = 'Roles/form';
$route['roles/export']["GET"] = 'Roles/export';
$route['roles/update']['POST'] = 'Roles/update';
$route['roles/delete']['POST'] = 'Roles/delete';
$route['roles/enabled']['POST'] = 'Roles/enabled';
$route['roles/disabled']['POST'] = 'Roles/disabled';


$route['modules'] = 'Modules/index';
$route['modules/index']["GET"] = 'Modules/index';
$route['modules/index']["pagination"] = 'Modules/pagination';
$route['modules/form']["GET"] = 'Modules/form';
$route['modules/export']["GET"] = 'Modules/export';
$route['modules/update']['POST'] = 'Modules/update';
$route['modules/delete']['POST'] = 'Modules/delete';
$route['modules/enabled']['POST'] = 'Modules/enabled';
$route['modules/disabled']['POST'] = 'Modules/disabled';


$route['sedder']["GET"]  = 'Sedder/index';
$route['sedder/index']["GET"]  = 'Sedder/index';


