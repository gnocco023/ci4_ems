<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// $routes->get('/', 'Home::index');
$routes->get('/', 'AccountController::login');
$routes->get('/logout', 'AccountController::logout');
$routes->match(['GET', 'POST'], '/account/login', 'AccountController::login');
$routes->match(['GET', 'POST'], '/account/register', 'AccountController::register');

$routes->get('/admin', 'AdminController::index');
$routes->match(['GET', 'POST'], '/admin/activate/(:num)', 'AdminController::activate/$1');
$routes->match(['GET', 'POST'], '/admin/delete/(:num)', 'AdminController::delete/$1');

$routes->match(['GET', 'POST'], '/admin/update/account_details/(:num)', 'AdminController::updateAccountDetails/$1');

$routes->get('/user', 'UserController::index');
