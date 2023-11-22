<?php

namespace MVC_DA1\Controllers\Client;

use MVC_DA1\Controller;
use MVC_DA1\Models\Category;
use MVC_DA1\Models\Product;
use PDO;

class ProductDetailController extends Controller
{
    /*
        Đây là hàm hiển thị danh sách user
    */
    public function index() {
        $id = $_GET['id'];
        
        $productCurrent = (new Product())->joinTable(
            $addColumn = [], 
            $connect = [['category', 'products.id_category', 'category.id']], 
            $conditions = [['products.id', '=', $id]], 
            $orderBy = []); 

//  echo '<pre>';
//                 print_r($categories);
//                 die;




        // $categoryProduct = (new Product())->categoryProduct($id, $addColumn = [
        //     ['products.id', 'product_detail']
        // ], $connect = [
        //     ['products', 'category', 'products.id_category', 'category.id'],
        // ],  $conditions = [
        //     ['products.id_category', '=']
        // ]);

        // $countProduct = (new Product())->countProduct($id);
               
        $this->render('ProductDetail/index', [
            'productCurrent' => $productCurrent,
            // 'categories' => $categories,
            // 'categoryProduct'=> $categoryProduct,
            // 'countProduct'=> $countProduct,
            
        ]);
    }
}