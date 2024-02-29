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

    # Pengguna
    $routes->get('pengguna', 'PenggunaController::index');
    $routes->get('pengguna/create', 'PenggunaController::create');
    $routes->post('pengguna/save', 'PenggunaController::save');
    $routes->get('pengguna/(:segment)/edit', 'PenggunaController::edit/$1');
    $routes->post('pengguna/(:segment)/update', 'PenggunaController::update/$1');
    $routes->get('pengguna/(:segment)/delete', 'PenggunaController::delete/$1');

    # Pemasok
    $routes->get('pemasok', 'PemasokController::index');
    $routes->get('pemasok/create', 'PemasokController::create');
    $routes->post('pemasok/save', 'PemasokController::save');
    $routes->get('pemasok/(:segment)/edit', 'PemasokController::edit/$1');
    $routes->post('pemasok/(:segment)/update', 'PemasokController::update/$1');
    $routes->get('pemasok/(:segment)/delete', 'PemasokController::delete/$1');

    # Satuan
    $routes->get('satuan', 'SatuanController::index');
    $routes->get('satuan/create', 'SatuanController::create');
    $routes->post('satuan/save', 'SatuanController::save');
    $routes->get('satuan/(:segment)/edit', 'SatuanController::edit/$1');
    $routes->post('satuan/(:segment)/update', 'SatuanController::update/$1');
    $routes->get('satuan/(:segment)/delete', 'SatuanController::delete/$1');

    # Barang
    $routes->get('barang', 'BarangController::index');
    $routes->get('barang/create', 'BarangController::create');
    $routes->post('barang/save', 'BarangController::save');
    $routes->get('barang/(:segment)/edit', 'BarangController::edit/$1');
    $routes->post('barang/(:segment)/update', 'BarangController::update/$1');
    $routes->get('barang/(:segment)/delete', 'BarangController::delete/$1');
});
