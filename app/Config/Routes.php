<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'Home::login');
$routes->get('cadastrar', 'Home::cadastrar');

$routes->get('hardware', 'Home::hardware');
$routes->get('perifericos', 'Home::perifericos');
$routes->get('cadeiras', 'Home::cadeiras');
$routes->get('monitores', 'Home::monitores');
$routes->get('computadores', 'Home::computadores');
$routes->get('notebooks', 'Home::notebooks');

$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::loginProcess');
