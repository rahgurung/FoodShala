<?php

defined('BASEPATH') or exit('No direct script access allowed');

$route['foods'] = 'foods/index';
$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;
