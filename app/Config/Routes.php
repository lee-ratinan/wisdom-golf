<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// NO LOCALE
$routes->get('reviews', 'Home::reviews');
$routes->get('instructors', 'Home::instructors');
$routes->get('contact', 'Home::contact');
$routes->get('q-and-a', 'Home::q_and_a');
$routes->get('packages', 'Home::packages');
$routes->get('blog', 'Home::blog');
$routes->get('blog/view/(:any)/(:num)', 'Home::blog_view/$1/$2');
$routes->get('blog/tag/(:any)', 'Home::blog_tag/$1');
$routes->get('blog/search', 'Home::blog_search');
// WITH LOCALE
$routes->get('{locale}/reviews', 'Home::reviews');
$routes->get('{locale}/instructors', 'Home::instructors');
$routes->get('{locale}/contact', 'Home::contact');
$routes->get('{locale}/q-and-a', 'Home::q_and_a');
$routes->get('{locale}/packages', 'Home::packages');
$routes->get('{locale}/blog', 'Home::blog');
$routes->get('{locale}/blog/view/(:any)', 'Home::blog/view/$1');
$routes->get('{locale}/blog/tag/(:any)', 'Home::blog/tag/$1');
$routes->get('{locale}/blog/search', 'Home::blog/search');
// HOME
$routes->get('{locale}', 'Home::index');
$routes->get('/', 'Home::index');
// SCRIPT
$routes->post('form-submission', 'Home::formSubmission');