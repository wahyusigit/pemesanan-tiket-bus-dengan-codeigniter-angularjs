<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Route Auth
$route['auth'] = "auth/login";

// Route Landing Page
// $route['pesan'] = "landing/pesan";
$route['pesan/add'] = "landing/postPesan";

// Route Api Handler
$route['api/auth/login'] = "auth/login2";
$route['api/auth/(:any)'] = "auth/$1";

$route['api/([a-z]+)'] = "api/handler/$1";
$route['api/([a-z]+)/(:any)'] = "api/handler/$1/$2";
$route['api/([a-z]+)/(:any)/(:any)'] = "api/handler/$1/$2/$3";

// Route Pelanggan
$route['pelanggan/pemesanan/all'] = 'pelanggan/pemesanan';
$route['pelanggan/(:any)'] = 'pelanggan/view';

$route['default_controller'] = 'landing';
$route['(:any)'] = 'landing';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

