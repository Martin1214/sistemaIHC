<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/usuarios', 'Home::usuarios');

$routes->get('/buscarC', 'Home::buscarC');
$routes->post('/buscarC', 'Home::buscarC');

$routes->get('/cedula', 'Home::cedula');
$routes->post('/cedula', 'Home::cedula');

$routes->get('/nuevoU', 'Home::nuevoU');
$routes->post('/nuevoU', 'Home::nuevoU');

$routes->get('/agregarU', 'Home::agregarU');
$routes->post('/agregarU', 'Home::agregarU');

$routes->post('/updatePass', 'Home::updatePass');

$routes->get('/select', 'Home::selectParcial');

$routes->post('/insert', 'Home::insertParcial');

$routes->post('/update', 'Home::updateParcial');


$routes->resource('restuser', ['controller' => 'restuser']);

$routes->post('sumar', 'RestUser::sumar');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}