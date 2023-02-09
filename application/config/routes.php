<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	http://codeigniter.com/user_guide/general/routing.html
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

//Rutas Amigables
$route['doctor/delete/(:num)'] = 'doctor/docController/delete/$1';
$route['doctor/update/(:num)'] = 'doctor/docController/update/$1';
$route['doctor/(:num)']        = 'doctor/docController/indexEdit/$1';
$route['newDoc/save']          = 'doctor/docController/save';
$route['newDoc']               = 'doctor/docController/add';
$route['doctors']              = 'doctor/docController/index';

$route['eps/delete/(:num)']    = 'epsController/delete/$1';
$route['eps/update/(:num)']    = 'epsController/update/$1';
$route['eps/(:num)']           = 'epsController/indexEdit/$1';
$route['newEps/save']          = 'epsController/save';
$route['newEps']               = 'epsController/add';
$route['epss']                 = 'epsController/index';


$route['user/delete/(:num)'] = 'patientsController/delete/$1';
$route['user/update/(:num)'] = 'patientsController/update/$1';
$route['user/(:num)'] = 'patientsController/editPatients/$1';
$route['newUser/save'] = 'patientsController/save';
$route['newUser'] = 'patientsController/add';
$route['users'] = 'patientsController/patients';
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['userP/updatePassword/(:num)'] = 'patientsController/updatePassword/$1';
$route['userP/(:num)'] = 'patientsController/indexPassword/$1';

$route['module'] = 'patientsController/module';
$route['consultar'] = 'patientsController/consultar';
$route['patients'] = 'patientsController/getPatients';
