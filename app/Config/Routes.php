<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Post::csse2310');


$routes->get('/email', 'Email_Controller::index');
$routes->post('/email/verify', 'Email_Controller::verify');


$routes->get('/account/favourites', 'Account::get_favourites');

$routes->get('/post/(:num)', 'Post::view_post/$1');
$routes->post('/post/favourite', 'Post::favourite');
$routes->post('/post/unfavourite', 'Post::unfavourite');

$routes->post('/submit/upload', 'Post::upload_image');

$routes->post('/post/make_comment', 'Post::make_comment');

$routes->get('/csse2310', 'Post::csse2310');
$routes->get('/infs3202', 'Post::infs3202');
$routes->get('/engg4900', 'Post::engg4900');
$routes->get('/login', 'Login::index');
$routes->get('/login/forgot', 'Login::forgot_pass');

$routes->post('/login/check_login', 'Login::check_login');
$routes->get('/login/logout','Login::logout');
$routes->get('/register', 'Register::index');
$routes->post('/register/check_register', 'Register::check_register');
$routes->post('/login/forgot/check_secret', 'Login::check_secret');
$routes->get('/account', 'Account::index');
$routes->post('/account/add_course', 'Account::add_course');
$routes->get('/submit', 'Submit::index');
$routes->post('/submit/check_submit', 'Submit::check_submit');

$routes->post('/account/update', 'Account::update_email');
$routes->get('/account/upload','Image::index');
$routes->post('/account/upload_check','Image::upload_picture');

$routes->get('/account/ajax', 'Account::getAJAXResult');
$routes->match(['get','post'],'/account/ajax', 'Account::getAJAXResult');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
