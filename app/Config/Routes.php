<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

// ===================== AUTH =====================
$routes->get('/login', 'Admin\Auth::login');
$routes->post('/login/process', 'Admin\Auth::loginProcess');
$routes->get('/register', 'Admin\Auth::register');
$routes->post('/register/process', 'Admin\Auth::registerProcess');
$routes->get('/logout', 'Admin\Auth::logout');

// ===================== ADMIN =====================
$routes->group('', ['filter' => 'role:admin'], function ($routes) {
    $routes->get('dashboard', 'Admin\Dashboard::index');

    // Kriteria
    $routes->get('kriteria', 'Admin\Kriteria::view');
    $routes->post('addKriteria', 'Admin\Kriteria::addKriteria');
    $routes->post('editKriteria/(:any)', 'Admin\Kriteria::editKriteria/$1');
    $routes->get('deleteKriteria/(:any)', 'Admin\Kriteria::deleteKriteria/$1');

    // Umur
    $routes->get('umur', 'Admin\Umur::view');
    $routes->post('addUmur', 'Admin\Umur::addUmur');
    $routes->post('editUmur/(:any)', 'Admin\Umur::editUmur/$1');
    $routes->get('deleteUmur/(:any)', 'Admin\Umur::deleteUmur/$1');

    // Berat
    $routes->get('rata', 'Admin\Rata::view');
    $routes->post('addRata', 'Admin\Rata::addRata');
    $routes->post('editRata/(:any)', 'Admin\Rata::editRata/$1');
    $routes->get('deleteRata/(:any)', 'Admin\Rata::deleteRata/$1');

    // Konsumsi
    $routes->get('konsumsi', 'Admin\Konsumsi::view');
    $routes->post('addKonsumsi', 'Admin\Konsumsi::addKonsumsi');
    $routes->post('editKonsumsi/(:any)', 'Admin\Konsumsi::editKonsumsi/$1');
    $routes->get('deleteKonsumsi/(:any)', 'Admin\Konsumsi::deleteKonsumsi/$1');

    // Aktivitas
    $routes->get('aktivitas', 'Admin\Aktivitas::view');
    $routes->post('addAktivitas', 'Admin\Aktivitas::addAktivitas');
    $routes->post('editAktivitas/(:any)', 'Admin\Aktivitas::editAktivitas/$1');
    $routes->get('deleteAktivitas/(:any)', 'Admin\Aktivitas::deleteAktivitas/$1');

    // Kematian
    $routes->get('kematian', 'Admin\Kematian::view');
    $routes->post('addKematian', 'Admin\Kematian::addKematian');
    $routes->post('editKematian/(:any)', 'Admin\Kematian::editKematian/$1');
    $routes->get('deleteKematian/(:any)', 'Admin\Kematian::deleteKematian/$1');

    // Alternatif
    $routes->get('alternatif', 'Admin\Alternatif::view');
    $routes->post('addAlternatif', 'Admin\Alternatif::addAlternatif');
    $routes->post('editAlternatif/(:any)', 'Admin\Alternatif::editAlternatif/$1');
    $routes->get('deleteAlternatif/(:any)', 'Admin\Alternatif::deleteAlternatif/$1');

    // Rating
    $routes->get('rating', 'Admin\Rating::view');
    $routes->post('addRating', 'Admin\Rating::addRating');
    $routes->post('editRating/(:any)', 'Admin\Rating::editRating/$1');
    $routes->get('deleteRating/(:any)', 'Admin\Rating::deleteRating/$1');

    // Perhitungan
    $routes->get('perhitungan', 'Admin\Perhitungan::prosesSAW');
});

// ===================== USER =====================
$routes->group('', ['filter' => 'role:user'], function ($routes) {
    $routes->get('inputdata', 'InputData::view');
    $routes->post('simpanData', 'InputData::simpanData');
    $routes->get('resetData', 'InputData::resetData');

    $routes->get('rekomendasi', 'Rekomendasi::view');
    $routes->get('prosesSAW', 'Rekomendasi::prosesSAW');

    $routes->get('riwayat', 'Riwayat::view');
    $routes->get('simpanriwayat', 'Riwayat::simpanRiwayat');
    $routes->post('riwayat/delete/(:num)', 'Riwayat::delete/$1');
});

