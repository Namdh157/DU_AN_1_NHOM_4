<?php

namespace MVC_DA1\Controllers\Client;

use MVC_DA1\Controller;
use MVC_DA1\Models\Product;
use MVC_DA1\Models\Category;

class HomeController extends Controller
{
    /*
        Đây là hàm hiển thị danh sách user
    */
    public function index() {
        $category = (new Category())->all();
        $productSeller = (new Product())->joinTable(
            $connect = [
                ['category', 'products.id_category', 'category.id']
            ],
            $orderBy = [
                ['products.view', 'DESC', 12]
            ]
        );
        $productDiscount = (new Product())->joinTable(
            $connect = [
                ['category', 'products.id_category', 'category.id']
            ],
            $orderBy = [
                ['products.discount', 'DESC', 9]
            ]
        );
        $this->render('home', [
            'category' => $category,
            'productSeller' => $productSeller,
            'productDiscount' => $productDiscount
        ]);
    }
}
