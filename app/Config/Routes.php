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
$routes->get('blog/view/(:num)', 'Home::blog_view/$1');
$routes->get('blog/tag/(:num)', 'Home::blog_tag/$1');
$routes->get('blog/search', 'Home::blog_search');
$routes->get('blog', 'Home::blog');
// WITH LOCALE
$routes->get('{locale}/reviews', 'Home::reviews');
$routes->get('{locale}/instructors', 'Home::instructors');
$routes->get('{locale}/contact', 'Home::contact');
$routes->get('{locale}/q-and-a', 'Home::q_and_a');
$routes->get('{locale}/packages', 'Home::packages');
$routes->get('{locale}/blog/view/(:num)', 'Home::blog_view/$1');
$routes->get('{locale}/blog/tag/(:num)', 'Home::blog_tag/$1');
$routes->get('{locale}/blog/search', 'Home::blog_search');
$routes->get('{locale}/blog', 'Home::blog');
// HOME
$routes->get('{locale}', 'Home::index');
$routes->get('/', 'Home::index');
// SCRIPT
$routes->post('form-submission', 'Home::formSubmission');
// CRON
$routes->get('cron/weekly', 'Cron::weekly');