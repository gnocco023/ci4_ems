<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/account/login', 'AccountController::login');
$routes->match(['GET', 'POST'], '/account/register', 'AccountController::register');

$routes->get('/admin', 'AdminController::index');
$routes->match(['GET', 'POST'], '/admin/activate/(:num)', 'AdminController::activate/$1');
$routes->match(['GET', 'POST'], '/admin/delete/(:num)', 'AdminController::delete/$1');
