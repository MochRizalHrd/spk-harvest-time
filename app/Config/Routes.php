<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/Dashboard', 'Admin\Dashboard::index');

//Login dan Register
$routes->get('/login', 'Admin\Auth::login');
$routes->post('/login/process', 'Admin\Auth::loginProcess');
$routes->get('/register', 'Admin\Auth::register');
$routes->post('/register/process', 'Admin\Auth::registerProcess');
$routes->get('/logout', 'Admin\Auth::logout');


// Data Kriteria
$routes->get('kriteria', 'Admin\Kriteria::view');
$routes->post('addKriteria', 'Admin\Kriteria::addKriteria');
$routes->post('editKriteria/(:any)', 'Admin\Kriteria::editKriteria/$1');
$routes->get('deleteKriteria/(:any)', 'Admin\Kriteria::deleteKriteria/$1');

// Data Alternatif
$routes->get('alternatif', 'Admin\Alternatif::view');
$routes->post('addAlternatif', 'Admin\Alternatif::addAlternatif');
$routes->post('editAlternatif/(:any)', 'Admin\Alternatif::editAlternatif/$1');
$routes->get('deleteAlternatif/(:any)', 'Admin\Alternatif::deleteAlternatif/$1');

// Data Rating Kecocokan Nilai
$routes->get('rating', 'Admin\Rating::view');
$routes->post('addRating', 'Admin\Rating::addRating');
$routes->post('editRating/(:any)', 'Admin\Rating::editRating/$1');
$routes->get('deleteRating/(:any)', 'Admin\Rating::deleteRating/$1');
