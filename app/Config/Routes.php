<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('reviews', 'Home::reviews');
$routes->get('coaches', 'Home::coaches');
$routes->get('contact', 'Home::contact');
$routes->get('blog', function() {
    $url = getenv('BLOG_URL');
    if (empty($url)) {
        return redirect()->to(base_url());
    }
    return redirect()->to();
});
$routes->get('{locale}/reviews', 'Home::reviews');
$routes->get('{locale}/coaches', 'Home::coaches');
$routes->get('{locale}/contact', 'Home::contact');
$routes->get('{locale}', 'Home::index');
$routes->get('/', 'Home::index');