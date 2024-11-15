<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'Home::login');
$routes->get('cadastrar', 'Home::cadastrar');

$routes->get('hardware', 'Home::hardware');
$routes->post('hardware', 'Home::hardware');

$routes->get('perifericos', 'Home::perifericos');
$routes->get('cadeiras', 'Home::cadeiras');
$routes->get('monitores', 'Home::monitores');
$routes->get('computadores', 'Home::computadores');
$routes->get('notebooks', 'Home::notebooks');

$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::authenticate');
$routes->match(['get', 'post'], 'esqueci-senha', 'AuthController::esqueceuasenha');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'auth']);

$routes->get('cadastro', 'UsuarioController::cadastrar');
$routes->post('cadastro/salvar', 'UsuarioController::salvar');

$routes->get('/admin/dashboard', 'AdminController::dashboard');
$routes->get('/logout', 'AuthController::logout');

$routes->group('admin', function ($routes) {
    $routes->get('dashboard', 'AuthController::adminDashboard');
    $routes->get('usuarios', 'UserController::index');
    $routes->get('usuarios/criar', 'UserController::criar');
    $routes->post('usuarios/criar', 'UserController::salvar');
    $routes->get('usuarios/editar/(:num)', 'UserController::editar/$1');
    $routes->post('usuarios/atualizar/(:num)', 'UserController::atualizar/$1');
    $routes->get('usuarios/deletar/(:num)', 'UserController::deletar/$1');
});

$routes->group('admin', function ($routes) {
    $routes->get('categorias', 'CategoriaController::index');
    $routes->get('categorias/criar', 'CategoriaController::criar');
    $routes->post('categorias/criar', 'CategoriaController::salvar');
    $routes->get('categorias/editar/(:num)', 'CategoriaController::editar/$1');
    $routes->post('categorias/atualizar/(:num)', 'CategoriaController::atualizar/$1');
    $routes->get('categorias/deletar/(:num)', 'CategoriaController::deletar/$1');
});

$routes->group('admin', function ($routes) {
    $routes->get('produtos', 'ProdutoController::index');
    $routes->get('produtos/criar', 'ProdutoController::criar');
    $routes->post('produtos/salvar', 'ProdutoController::salvar');
    $routes->get('produtos/editar/(:num)', 'ProdutoController::editar/$1');
    $routes->post('produtos/atualizar/(:num)', 'ProdutoController::atualizar/$1');
    $routes->get('produtos/deletar/(:num)', 'ProdutoController::deletar/$1');
});
