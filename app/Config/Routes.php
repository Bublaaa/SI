<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'PaginationController::index');

$routes->get('class', 'ClassController::index');
$routes->get('class/create', 'ClassController::create');
$routes->post('class/store', 'ClassController::store');
$routes->get('class/edit/(:num)', 'ClassController::edit/$1');
$routes->post('class/update/(:num)', 'ClassController::update/$1');
$routes->get('class/delete/(:num)', 'ClassController::delete/$1');

$routes->get('assignments', 'ClassAssignmentController::index');
$routes->get('assignments/create', 'ClassAssignmentController::create');
$routes->post('assignments/store', 'ClassAssignmentController::store');
$routes->get('assignments/edit/(:num)', 'ClassAssignmentController::edit/$1');
$routes->post('assignments/update/(:num)', 'ClassAssignmentController::update/$1');
$routes->get('assignments/delete/(:num)', 'ClassAssignmentController::delete/$1');


$routes->get('/users', 'UserController::index');
$routes->get('/users/create', 'UserController::create');
$routes->post('/users/store', 'UserController::store');
$routes->get('/users/edit/(:num)', 'UserController::edit/$1');
$routes->put('/users/update/(:num)', 'UserController::update/$1');
$routes->get('/users/delete/(:num)', 'UserController::delete/$1');
