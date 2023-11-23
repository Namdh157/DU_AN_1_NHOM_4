<?php

use MVC_DA1\Controllers\Admin\UserController;
use MVC_DA1\Controllers\Admin\CategoryController;
use MVC_DA1\Controllers\Admin\CommentController;
use MVC_DA1\Controllers\Admin\DashboardController;
use MVC_DA1\Controllers\Admin\ProductController;
use MVC_DA1\Controllers\Client\HomeController;
use MVC_DA1\Controllers\Client\NotificationController;
use MVC_DA1\Router;


$router = new Router();


// rang chủ website
$router->addRoute('/', HomeController::class, 'index');
$router->addRoute('/Notification',  HomeController::class, 'notification');

// Trang chủ admin
$router->addRoute('/admin/dashboard', DashboardController::class, 'index');

// Người dùng
$router->addRoute('/admin/users', UserController::class, 'index');
$router->addRoute('/admin/users/create', UserController::class, 'create');
$router->addRoute('/admin/users/update', UserController::class, 'update');
$router->addRoute('/admin/users/delete', UserController::class, 'delete');

// Danh mục
$router->addRoute('/admin/categories', CategoryController::class, 'index');
$router->addRoute('/admin/categories/create', CategoryController::class, 'create');
$router->addRoute('/admin/categories/update', CategoryController::class, 'update');
$router->addRoute('/admin/categories/delete', CategoryController::class, 'delete');

$router->addRoute('/admin/comments', CommentController::class, 'index');
$router->addRoute('/admin/comments/delete', CommentController::class, 'delete');
$router->addRoute('/admin/comments/update', CommentController::class, 'update');


// Sản phẩm
$router->addRoute('/admin/products', ProductController::class, 'index');
$router->addRoute('/admin/products/create', ProductController::class, 'create');
$router->addRoute('/admin/products/update', ProductController::class, 'update');
$router->addRoute('/admin/products/delete', ProductController::class, 'delete');

