<?php

use CodeIgniter\Router\RouteCollection;

// these links tells codelgniter which url should open specific page

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
$routes->get('books/edit/(:num)', 'Book::edit/$1');
$routes->post('books/update/(:num)', 'Book::update/$1');
$routes->post('books/delete/(:num)', 'Book::delete/$1');
$routes->get('books/search', 'Book::search');




//this sends the updated information to the server using POST method