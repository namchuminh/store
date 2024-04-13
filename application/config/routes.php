<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin'] = 'admin/Home';


$route['admin/login'] = 'Admin/Login';
$route['admin/logout'] = 'Admin/Logout';


$route['admin/product'] = 'Admin/Product';
$route['admin/product/add'] = 'Admin/Product/Add';
$route['admin/product/(:any)/update'] = 'Admin/Product/Update/$1';
$route['admin/product/(:any)/delete'] = 'Admin/Product/Delete/$1';
$route['admin/product/(:any)/import'] = 'Admin/Product/Import/$1';
$route['admin/product/(:any)/history'] = 'Admin/Product/History/$1';


$route['admin/supplier'] = 'Admin/Supplier';
$route['admin/supplier/add'] = 'Admin/Supplier/Add';
$route['admin/supplier/(:any)/update'] = 'Admin/Supplier/Update/$1';
$route['admin/supplier/(:any)/delete'] = 'Admin/Supplier/Delete/$1';
$route['admin/supplier/(:any)/history'] = 'Admin/Supplier/History/$1';


$route['admin/category'] = 'Admin/Category';
$route['admin/category/add'] = 'Admin/Category/Add';
$route['admin/category/(:any)/update'] = 'Admin/Category/Update/$1';
$route['admin/category/(:any)/delete'] = 'Admin/Category/Delete/$1';


$route['admin/order'] = 'Admin/Order';
$route['admin/order/(:any)/detail'] = 'Admin/Order/Detail/$1';
$route['admin/order/(:any)/pay'] = 'Admin/Order/Pay/$1';


$route['admin/staff'] = 'Admin/Staff';
$route['admin/staff/add'] = 'Admin/Staff/Add';
$route['admin/staff/(:any)/update'] = 'Admin/Staff/Update/$1';
$route['admin/staff/(:any)/delete'] = 'Admin/Staff/Delete/$1';


$route['admin/password'] = 'Admin/Password';

$route['admin/setting'] = 'Admin/Setting';

$route['add-menu'] = 'Home/addMenu';
$route['delete-menu/(:any)'] = 'Home/deleteMenu/$1';
$route['order'] = 'Web/Order/addOrder';
$route['order/pay'] = 'Web/Order/checkPay';




