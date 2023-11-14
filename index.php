<?php

require 'vendor/autoload.php';
require 'routes.php';

$requestUri = $_SERVER['REQUEST_URI'];
$baseUri = '/MVC_DA1';

// Xóa phần cố định (baseUri) từ requestUri
$uri = str_replace($baseUri, '', $requestUri);

$router->dispatch($uri);
