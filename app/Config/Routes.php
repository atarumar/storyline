<?php

use App\Controllers\Berita;
use App\Controllers\Pengguna;
use App\Controllers\Statistik;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/daftar', [Pengguna::class, 'daftar']);
$routes->post('/masuk', [Pengguna::class, 'masuk']);
$routes->post('/profil-pengguna', [Pengguna::class, 'getData']);

$routes->get('/semua-berita', [Berita::class, 'show'], ['filter' => 'authFilter']);
$routes->post('/filter-berita', [Berita::class, 'filter'], ['filter' => 'authFilter']);
$routes->post('/tambah-berita', [Berita::class, 'create'], ['filter' => 'authFilter']);
$routes->post('/edit-berita', [Berita::class, 'edit'], ['filter' => 'authFilter']);
$routes->post('/hapus-berita', [Berita::class, 'delete'], ['filter' => 'authFilter']);
$routes->get('berita', 'Berita::index');

$routes->get('/foto/(:any)', [Berita::class, 'downloadfile']);
$routes->get('/statistik', [Statistik::class, 'showAll']);

$routes->get('/story/new', 'StoryController::index'); // For showing the new story form
$routes->post('/story/save', 'StoryController::save'); // For saving a new story
$routes->get('/story/list', 'StoryController::list'); // For listing all stories

$routes->get('/login', 'Pengguna::loginForm'); // For rendering the login view
$routes->post('/masuk', 'Pengguna::masuk');    // For handling login submission
$routes->get('/signup', 'Pengguna::daftarForm'); // For rendering the signup view
$routes->post('/signup', 'Pengguna::daftar');    // For handling signup submission

$routes->get('/articles', 'ArticleController::index'); // Display published articles
$routes->get('/new-story', 'StoryController::index'); // Display the new story form
$routes->post('/story/save', 'StoryController::save'); // Save the new story
$routes->get('/articles/(:num)', 'ArticleController::show/$1');

$routes->get('/settings', 'SettingsController::index');
$routes->post('/settings/update', 'SettingsController::update');
$routes->post('/settings/delete', 'SettingsController::delete'); // Delete account
$routes->get('/logout', 'SettingsController::logout'); // Log out

$routes->get('/story/edit/(:num)', 'StoryController::edit/$1'); // Show the edit form
$routes->post('/story/update/(:num)', 'StoryController::update/$1'); // Handle the edit submission
$routes->post('/story/save', 'StoryController::save');
$routes->get('/story/delete/(:num)', 'StoryController::delete/$1');
