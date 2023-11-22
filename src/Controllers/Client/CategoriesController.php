<?php

namespace MVC_DA1\Controllers\Client;

use MVC_DA1\Controller;
use MVC_DA1\Models\Category;
use MVC_DA1\Models\Product;
use PDO;

class CategoriesController extends Controller
{
    /*
        Đây là hàm hiển thị danh sách user
    */
    public function index() {
        $id = $_GET['id'];
        $categoryCurrent = (new Category())->findOne($id);
        $categories = (new Category())->all();
        $categoryProduct = (new Product())->categoryProduct($id, $addColumn = [
            ['products.id', 'product_detail']
        ], $connect = [
            ['products', 'category', 'products.id_category', 'category.id'],
        ],  $conditions = [
            ['products.id_category', '=']
        ]);

        $countProduct = (new Product())->countProduct($id);
            // echo '<pre>';
            // print_r($categoryProduct);
            // die;
        $this->render('Categories/index', [
            'categoryCurrent' => $categoryCurrent,
            'categories' => $categories,
            'categoryProduct'=> $categoryProduct,
            'countProduct'=> $countProduct,
            
        ]);
    }
}