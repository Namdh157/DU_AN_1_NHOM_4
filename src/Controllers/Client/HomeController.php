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
        $productSeller = (new Product())->allProductsTypes(
            $orderBy = [
                ['products.view', 'DESC', 12]
            ]
        );
        $productDiscount = (new Product())->allProductsTypes(
            $orderBy = [
                ['products.discount', 'DESC', 9]
            ]
        );
        foreach ($productSeller as $key => &$products) {
            if(!empty($products['image_urls'])) {
                $products['image_urls'] = explode(",",$products['image_urls']);
            }
            
            if(!empty($products['sizes'])) {
                $products['sizes'] = explode(",",$products['sizes']);
            }

            if(!empty($products['color'])) {
                $products['color'] = explode(",",$products['color']);
            }
        }

        foreach ($productDiscount as $key => &$products) {
            if(!empty($products['image_urls'])) {
                $products['image_urls'] = explode(",",$products['image_urls']);
            }
            
            if(!empty($products['sizes'])) {
                $products['sizes'] = explode(",",$products['sizes']);
            }

            if(!empty($products['color'])) {
                $products['color'] = explode(",",$products['color']);
            }
        }
        $this->render('home', [
            'category' => $category,
            'productSeller' => $productSeller,
            'productDiscount' => $productDiscount
        ]);
    }

    public function categories() {
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
            // print_r($this->allCategories);
            // die;
        $this->render('Categories/index', [
            'categoryCurrent' => $categoryCurrent,
            'categories' => $categories,
            'categoryProduct'=> $categoryProduct,
            'countProduct'=> $countProduct,
            'allCategories' => $this->allCategories
            
        ]);
    }

    public function productDetail(){
        $id = $_GET['id'];
        
        $productCurrent = (new Product())->joinTable(
            $addColumn = [], 
            $connect = [['category', 'products.id_category', 'category.id']], 
            $conditions = [['products.id', '=', $id]], 
            $orderBy = []);
            
            


               
        $this->render('ProductDetail/index', [
            'productCurrent' => $productCurrent,
            'allCategories' => $this->allCategories
            
        ]);
    }

    public function register(){
        $this->render1('Authentication/register');
    }

    public function login(){
        $this->render1('Authentication/login');
    }
}