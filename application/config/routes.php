<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['tracks/create'] = 'tracks/create';
$route['tracks/(:any)'] = 'tracks/view/$1';
$route['tracks'] = 'tracks/index';
$route['genres/create'] = 'genres/create';
$route['genres/(:any)'] = 'genres/view/$1';
$route['genres'] = 'genres/index';
$route['posts/create'] = 'posts/create';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts'] = 'posts/index';
$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
