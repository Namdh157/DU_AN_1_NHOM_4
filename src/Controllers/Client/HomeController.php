<?php

namespace MVC_DA1\Controllers\Client;

use MVC_DA1\Controller;
use MVC_DA1\Models\Product;
use MVC_DA1\Models\Category;

class HomeController extends Controller
{
    
    protected $allCategories;

    public function __construct() {
        $this->allCategories = (new Category())->all();
    }

    public function index() {
        $category = (new Category())->all();

        $productSeller = (new Product())->joinTable(
            $addColumn = [],
            $connect = [
                ['category', 'products.id_category', 'category.id']
            ],
            $conditions = [],
            $orderBy = [
                ['products.view', 'DESC', 12]
            ]
        );

        $productDiscount = (new Product())->joinTable(
            $addColumn = [],
            $connect = [
                ['category', 'products.id_category', 'category.id']
            ],
            $conditions = [],
            $orderBy = [
                ['products.discount', 'DESC', 9]
            ]
        );
        $this->render('home', [
            'category' => $category,
            'productSeller' => $productSeller,
            'productDiscount' => $productDiscount,
            'categories' => $this->allCategories
        ]);

    }

    public function notification() { 
        $this->render("notification", [
            'categories' => $this->allCategories

        ]);
    }
}