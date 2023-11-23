<?php

use MVC_DA1\Controllers\Admin\CartController;
use MVC_DA1\Controllers\Admin\UserController;
use MVC_DA1\Controllers\Admin\CategoryController;
use MVC_DA1\Controllers\Admin\DashboardController;
use MVC_DA1\Controllers\Client\CategoriesController;
use MVC_DA1\Controllers\Client\HomeController;
use MVC_DA1\Controllers\Client\ProductDetailController;


use MVC_DA1\Router;


$router = new Router();



$router->addRoute('/', HomeController::class, 'index');
$router->addRoute('/Categories', HomeController::class, 'categories');
$router->addRoute('/ProductDetail', HomeController::class, 'productDetail');
$router->addRoute('/Register', HomeController::class, 'register');
$router->addRoute('/Login', HomeController::class, 'login');  



$router->addRoute('/admin/Dashboard', DashboardController::class, 'index');

$router->addRoute('/admin/users', UserController::class, 'index');
$router->addRoute('/admin/users/create', UserController::class, 'create');
$router->addRoute('/admin/users/update', UserController::class, 'update');
$router->addRoute('/admin/users/delete', UserController::class, 'delete');

$router->addRoute('/admin/categories', CategoryController::class, 'index');
$router->addRoute('/admin/categories/create', CategoryController::class, 'create');
$router->addRoute('/admin/categories/update', CategoryController::class, 'update');
$router->addRoute('/admin/categories/delete', CategoryController::class, 'delete');

$router->addRoute('/admin/carts', CartController::class, 'index');
$router->addRoute('/admin/carts/create', CartController::class, 'create');
$router->addRoute('/admin/carts/update', CartController::class, 'update');
$router->addRoute('/admin/carts/delete', CartController::class, 'delete');
