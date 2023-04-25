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

$route['auth']               = 'sistema/AuthLogin/index';
$route['auth/index']["GET"]  = 'sistema/AuthLogin/index';
$route['auth/login']["POST"] = 'sistema/AuthLogin/login';

$route['auth/forgot']["GET"]  = 'sistema/AuthForGotPassword/index';
$route['auth/forgot-password']["POST"] = 'sistema/AuthForGotPassword/forgotPassword';

$route['auth/register']["GET"]  = 'sistema/AuthRegister/index';
$route['auth/register-user']["POST"] = 'sistema/AuthRegister/register';

$route['snippet/index']["GET"] = 'Snippets/index';

$route['dashboard']["GET"]  = 'dashboard/index';

$route['roles'] = 'sistema/Roles/index';
$route['roles/index']["GET"] = 'sistema/Roles/index';
$route['roles/pagination']["GET"] = 'sistema/Roles/pagination';
$route['roles/form']["GET"] = 'sistema/Roles/form';
$route['roles/export']["GET"] = 'sistema/Roles/export';
$route['roles/update']['POST'] = 'sistema/Roles/update';
$route['roles/delete']['POST'] = 'sistema/Roles/delete';
$route['roles/enabled']['POST'] = 'sistema/Roles/enabled';
$route['roles/disabled']['POST'] = 'sistema/Roles/disabled';


$route['modules'] = 'sistema/Modules/index';
$route['modules/index']["GET"] = 'sistema/Modules/index';
$route['modules/pagination']["GET"] = 'sistema/Modules/pagination';
$route['modules/form']["GET"] = 'sistema/Modules/form';
$route['modules/export']["GET"] = 'sistema/Modules/export';

$route['modules/create']['POST'] = 'sistema/Modules/create';
$route['modules/update']['PUT'] = 'sistema/Modules/update';
$route['modules/delete']['DELETE'] = 'sistema/Modules/delete';
$route['modules/enabled']['POST'] = 'sistema/Modules/enabled';
$route['modules/disabled']['POST'] = 'sistema/Modules/disabled';


$route['sedder']["GET"]  = 'sistema/Sedder/index';
$route['sedder/index']["GET"]  = 'sistema/Sedder/index';


