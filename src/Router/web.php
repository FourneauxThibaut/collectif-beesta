<?php

use Src\Router\Router;
$route = new Router($_SERVER['REQUEST_URI']);

// HomeController
$route->add('/error-{id}', 'HomeController@not_found');
$route->add('/', 'HomeController@index');
$route->add('/projects', 'HomeController@work');
$route->add('/a-propos', 'HomeController@about');
$route->add('/contact', 'HomeController@contact');

// $route->print_all_routes();
$route->load();