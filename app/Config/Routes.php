<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');
$routes->get('/account/login', 'AccountController::login');
$routes->match(['GET', 'POST'], '/account/register', 'AccountController::register');

$routes->get('/admin', 'AdminController::index');
