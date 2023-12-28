<?php

use App\Controllers\ClientController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::loginForm', ['as' => 'login_form']);
$routes->post('/login_submit', 'AuthController::loginSubmit', ['as' => 'login_submit']);

$routes->group('/admin', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/', 'ClientController::listAll', ['as' => 'list_all']);
    $routes->get('create_client', 'ClientController::createClient', ['as' => 'create_client']);
    $routes->get('update_client/(:num)', "ClientController::updateClient/$1", ['as' => 'update_client']);
    $routes->post('create_client_submit', 'ClientController::createClientSubmit', ['as' => 'create_client_submit']);
    $routes->get('delete_client/(:num)', 'ClientController::deleteClient/$1', ['as' => 'delete_client']);
    $routes->post('update_client_submit', 'ClientController::updateClientSubmit', ['as' => 'update_client_submit']);
});
