<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('reviews', 'Home::reviews');
$routes->get('instructors', 'Home::instructors');
$routes->get('contact', 'Home::contact');
$routes->get('{locale}/reviews', 'Home::reviews');
$routes->get('{locale}/instructors', 'Home::instructors');
$routes->get('{locale}/contact', 'Home::contact');
$routes->get('{locale}', 'Home::index');
$routes->get('/', 'Home::index');