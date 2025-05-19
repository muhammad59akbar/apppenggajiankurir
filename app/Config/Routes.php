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
    $routes->delete('deletePengguna/(:num)', 'Admin::hapusPengguna/$1');
});

$routes->group('spxcgk4/barang', function ($routes) {
    $routes->get('DataBarang', 'Barang::index');
    $routes->post('tambahBarang', 'Barang::tambahBarang');
    $routes->get('detailBarang/(:segment)', 'Barang::detailBarang/$1');
});

$routes->group('spxcgk4/barang/subbarang', function ($routes) {
    $routes->post('tambahsubBarang', 'SubBarang::TambahSubBarang');
});
