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
$route['default_controller'] = 'homepage';
$route['404_override'] = 'cms/not_found';
$route['translate_uri_dashes'] = FALSE;

//custom routes
$route['contact'] = 'cms/contact';
$route['register'] = 'customer/register';
$route['customer_orders'] = 'customer/customer_orders';
$route['customer_account'] = 'customer/customer_account';
$route['customer_order'] = 'customer/customer_order';
$route['customer_wishlist'] = 'customer/customer_wishlist';
$route['cart'] = 'basket/cart';
$route['checkout1'] = 'checkout/checkout1';
$route['checkout2'] = 'checkout/checkout2';
$route['checkout3'] = 'checkout/checkout3';
$route['checkout4'] = 'checkout/checkout4';
$route['category'] = 'categories/category';
$route['detail'] = 'product/detail';
$route['product/(:num)'] = 'product/detail/$1';
$route['category/(:num)'] = 'categories/category/$1';


/**
 * Admin routes
 */
//dashboard
$route['admin'] = 'admin/dashboard';

//login
$route['admin/login'] = 'admin/login';
$route['admin/loginPost'] = 'admin/login/loginPost';
$route['admin/logoutPost'] = 'admin/login/logoutPost';

//orders
$route['admin/orders'] = 'admin/orders/grid';
$route['admin/order/:num'] = 'admin/orders/item';

//products
$route['admin/products'] = 'admin/products/grid';
$route['admin/product/(:num)'] = 'admin/products/item/$1';
$route['admin/product/new'] = 'admin/products/item/';
$route['admin/product/(:num)/save'] = 'admin/products/save/$1';
$route['admin/product/new/save'] = 'admin/products/save/';
$route['admin/product/(:num)/delete'] = 'admin/products/delete/$1';
$route['admin/uploadfile'] = 'admin/products/uploadImage/';
