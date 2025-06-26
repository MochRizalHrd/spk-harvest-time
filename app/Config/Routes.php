<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/Dashboard', 'Admin\Dashboard::index');

// Data Kriteria
$routes->get('kriteria', 'Admin\Kriteria::view');
$routes->post('addKriteria', 'Admin\Kriteria::addKriteria');
$routes->post('editKriteria/(:any)', 'Admin\Kriteria::editKriteria/$1');
$routes->get('deleteKriteria/(:any)', 'Admin\Kriteria::deleteKriteria/$1');

// Data Rating Kecocokan Nilai
$routes->get('rating', 'Admin\Rating::view');
$routes->post('addRating', 'Admin\Rating::addRating');
$routes->post('editRating/(:any)', 'Admin\Rating::editRating/$1');
$routes->get('deleteRating/(:any)', 'Admin\Rating::deleteRating/$1');
