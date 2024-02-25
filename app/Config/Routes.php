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
});
