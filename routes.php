<?php

use MVC_DA1\Controllers\Admin\UserController;
use MVC_DA1\Controllers\Admin\CategoryController;
use MVC_DA1\Controllers\Admin\CommentController;
use MVC_DA1\Controllers\Admin\DashboardController;
use MVC_DA1\Controllers\Client\HomeController;
use MVC_DA1\Router;


$router = new Router();



$router->addRoute('/', HomeController::class, 'index');

$router->addRoute('/admin/Dashboard', DashboardController::class, 'index');

$router->addRoute('/admin/users', UserController::class, 'index');
$router->addRoute('/admin/users/create', UserController::class, 'create');
$router->addRoute('/admin/users/update', UserController::class, 'update');
$router->addRoute('/admin/users/delete', UserController::class, 'delete');

$router->addRoute('/admin/categories', CategoryController::class, 'index');
$router->addRoute('/admin/categories/create', CategoryController::class, 'create');
$router->addRoute('/admin/categories/update', CategoryController::class, 'update');
$router->addRoute('/admin/categories/delete', CategoryController::class, 'delete');

$router->addRoute('/admin/comments', CommentController::class, 'index');
$router->addRoute('/admin/comments/delete', CommentController::class, 'delete');
$router->addRoute('/admin/comments/update', CommentController::class, 'update');

