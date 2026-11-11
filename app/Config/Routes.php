<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

// Login and logout
$routes->get('login', 'Login::index');
$routes->post('login/authenticate', 'Login::authenticate');
$routes->get('logout', 'Login::logout');

// Dashboard
$routes->get('dashboard', 'Dashboard::index');

// Book management
$routes->get('books', 'Book::index');
$routes->post('books/save', 'Book::save');
$routes->get('books/list', 'Book::list');
