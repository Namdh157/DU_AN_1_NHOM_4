<?php

use MVC_DA1\Controllers\Admin\CartController;
use MVC_DA1\Controllers\Admin\CategoriesPropertiesController;
use MVC_DA1\Controllers\Admin\UserController;
use MVC_DA1\Controllers\Admin\CategoryController;
use MVC_DA1\Controllers\Admin\CommentController;
use MVC_DA1\Controllers\Admin\DashboardController;
use MVC_DA1\Controllers\Admin\ProductController;
use MVC_DA1\Controllers\Admin\ProductPropertiesController;
use MVC_DA1\Controllers\APIController;
use MVC_DA1\Controllers\Client\HomeController;
use MVC_DA1\Router;


$router = new Router();

$requestUri = $_SERVER['REQUEST_URI'];
$baseUri = '/MVC_DA1';

// Xóa phần cố định (baseUri) từ requestUri
$uri = str_replace($baseUri, '', $requestUri);
$pos = strpos($uri, '?');
if ($pos !== false) {
    $uri = substr($uri, 0, $pos); // Lấy phần của chuỗi trước dấu '?'
}


// trang chủ website
$router->addRoute('/', HomeController::class, 'index');
$router->addRoute('/Notification', HomeController::class, 'notification');
$router->addRoute('/Contact', HomeController::class, 'contact');
$router->addRoute('/Categories', HomeController::class, 'categories');
$router->addRoute('/ProductDetail', HomeController::class, 'productDetail');
$router->addRoute('/Register', HomeController::class, 'register');
$router->addRoute('/Login', HomeController::class, 'login');
$router->addRoute('/Logout', HomeController::class, 'logout');
$router->addRoute('/allProducts', HomeController::class, 'allProducts');


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

// Sản phẩm
$router->addRoute('/admin/products', ProductController::class, 'index');
$router->addRoute('/admin/products/create', ProductController::class, 'create');
$router->addRoute('/admin/products/update', ProductController::class, 'update');
$router->addRoute('/admin/products/delete', ProductController::class, 'delete');

//thuộc tính sản phẩm
$router->addRoute('/admin/productsProperties', ProductPropertiesController::class, 'index');
$router->addRoute('/admin/productsProperties/create', ProductPropertiesController::class, 'create');
$router->addRoute('/admin/productsProperties/update', ProductPropertiesController::class, 'update');
$router->addRoute('/admin/productsProperties/delete', ProductPropertiesController::class, 'delete');

//danh mục thuộc tính sản phẩm
$router->addRoute('/admin/categoriesProductsProperties', CategoriesPropertiesController::class, 'index');
$router->addRoute('/admin/categoriesProductsProperties/create', CategoriesPropertiesController::class, 'create');
$router->addRoute('/admin/categoriesProductsProperties/update', CategoriesPropertiesController::class, 'update');
$router->addRoute('/admin/categoriesProductsProperties/delete', CategoriesPropertiesController::class, 'delete');

// Giỏ hàng
$router->addRoute('/admin/carts', CartController::class, 'index');
$router->addRoute('/admin/carts/create', CartController::class, 'create');
$router->addRoute('/admin/carts/update', CartController::class, 'update');
$router->addRoute('/admin/carts/delete', CartController::class, 'delete');

// sử dụng api
 $router->addRoute('/api/products', APIController::class, 'products');
 $router->addRoute('/api/carts', APIController::class, 'carts');


//Bình luận 
$router->addRoute('/admin/comments', CommentController::class, 'index');
$router->addRoute('/admin/comments/delete', CommentController::class, 'delete');
$router->addRoute('/admin/comments/update', CommentController::class, 'update');
$router->addRoute('/admin/comments/create', CommentController::class, 'create');


$router->dispatch($uri);