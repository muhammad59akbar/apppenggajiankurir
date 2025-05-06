<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Admin::index');

$routes->group('private/admin', function ($routes) {
    $routes->get('DataPengguna', 'Admin::ListPengguna');
    $routes->post('tambahuserpengguna', 'Admin::tambahPengguna');
    $routes->get('detailPengguna/(:segment)', 'Admin::detailPengguna/$1');
    $routes->post('UpdatePengguna/(:num)', 'Admin::editPengguna/$1');
});
