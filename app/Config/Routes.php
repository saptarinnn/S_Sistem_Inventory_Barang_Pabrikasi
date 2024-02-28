<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/* Not Auth */
# Home
$routes->get('/', function () {
    return redirect()->to('login');
});
$routes->group('', ['filter' => 'notauth'], static function ($routes) {
    # Login
    $routes->get('login', 'AuthController::login');
    $routes->post('login', 'AuthController::loginPost');
});

$routes->group('', ['filter' => 'auth'], static function ($routes) {
    # Logout
    $routes->get('logout', 'AuthController::logout');

    # Dashboard
    $routes->get('dashboard', function () {
        return view('layouts/app');
    });

    # Users
    $routes->get('users', 'UserController::index');
    $routes->get('users/create', 'UserController::create');
    $routes->post('users/save', 'UserController::save');
    $routes->get('users/(:segment)/edit', 'UserController::edit/$1');
    $routes->post('users/(:segment)/update', 'UserController::update/$1');
    $routes->get('users/(:segment)/delete', 'UserController::delete/$1');

    # Supplier
    $routes->get('suppliers', 'UserController::index');
    $routes->get('suppliers/create', 'UserController::create');
    $routes->post('suppliers/save', 'UserController::save');
    $routes->get('suppliers/(:segment)/edit', 'UserController::edit/$1');
    $routes->post('suppliers/(:segment)/update', 'UserController::update/$1');
    $routes->get('suppliers/(:segment)/delete', 'UserController::delete/$1');
});
