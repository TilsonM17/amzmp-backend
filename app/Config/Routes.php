<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::loginForm', ['as' => 'login_form']);
$routes->post('/login', 'AuthController::loginSubmit', ['as' => 'login_submit']);
