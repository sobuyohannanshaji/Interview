<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->GET('/','Guest::index');
$routes->GET('index','Guest::index');
$routes->GET('login','Home::index');
$routes->GET('signup','Home::signup');
$routes->POST('verify','Home::verify');
$routes->POST('userstore','Home::userstore');
$routes->GET('logout','Home::logout');
$routes->POST('cart-add','Guest::cart_add');
$routes->GET('cart','Guest::cart');
$routes->POST('user-check','Home::user');
$routes->GET('cart-remove/(:num)','Guest::remove/$1');

$routes->group('user',function($routes){
	$routes->GET('dashboard','User::index',['filters'=>'auth_login']);
	$routes->POST('productstore','User::productstore');
	$routes->GET('delete/(:num)','User::delete/$1');
});
