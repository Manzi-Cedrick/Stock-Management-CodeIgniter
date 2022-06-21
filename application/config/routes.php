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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'Dashboard/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['user/login']='Dashboard/showLoginUser';
$route['user/signup']='Dashboard/createUser';
$route['user/insert']='Dashboard/storeUser';
$route['user/loginUser']='Dashboard/loginUser';
$route['user/delete/(:num)']='Dashboard/deleteUser/$1';
$route['user/updateUser/(:num)']='Dashboard/updateUser/$1';
$route['user/editUser/(:num)']='Dashboard/editUser/$1';
$route['user/report']='Dashboard/UserReport';

//$routes products
$route['products']='Products/index';
$route['products/delete/(:num)']='Products/deleteProduct/$1';
$route['products/edit/(:num)']='Products/editProduct/$1';
$route['products/update/(:num)']='Products/updateProduct/$1';
$route['products/new']='Products/createProduct';
$route['products/store']='Products/storeProduct';
$route['products/report']='Products/ProductReport';
//$route stockData
$route['stock']='StockInv/index';
$route['stock/new']='StockInv/createInv';
$route['stock/store']='StockInv/storeInv';
$route['stock/delete/(:num)']='StockInv/deleteStock/$1';
$route['stock/editStock/(:num)']='StockInv/editStock/$1';
$route['stock/update/(:num)']='StockInv/updateStock/$1';
$route['stock/report']='StockInv/StockReport';
//$route outgoing
$route['outgoing']='Outgoing/index';
$route['outgoing/new']='Outgoing/createOut';
$route['outgoing/store']='Outgoing/storeOut';
$route['outgoing/delete/(:num)']='Outgoing/deleteOut/$1';
$route['outgoing/editoutgoing/(:num)']='Outgoing/editOut/$1';
$route['outgoing/update/(:num)']='Outgoing/updateOut/$1';
$route['outgoing/report']='Outgoing/OutgoingReport';