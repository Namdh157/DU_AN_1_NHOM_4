<?php

namespace MVC_DA1\Controllers\Admin;

use MVC_DA1\Controller;
use MVC_DA1\Models\Category;
use MVC_DA1\Models\Product;

class ProductController extends Controller
{
    protected $allProducts;

    public function __construct()
    {
        $this->allProducts = (new Product)->allProductsTypes([['products.id', 'DESC']]);
    }
    public function index()
    {
        foreach ($this->allProducts as $key => &$products) {
            if (!empty($products['image_urls'])) {
                $products['image_urls'] = explode(",", $products['image_urls']);
            }

            if (!empty($products['sizes'])) {
                $products['sizes'] = explode(",", $products['sizes']);
            }

            if (!empty($products['color'])) {
                $products['color'] = explode(",", $products['color']);
            }
        }

        // echo "<pre>";
        // print_r($this->allProducts);
        // die;

        $this->renderAdmin(
            'products/index',
            [
                'products' => $this->allProducts
            ]
        );
    }
    public function create()
    {
        $productModel = (new Product);
        
        $allCategory = (new Category)->all();


        if (isset($_POST['btn-submit'])) {
            $data = [
                'name_product' => $_POST['nameProduct'],
                'price' => $_POST['price'],
                'description' => $_POST['description'],
                'view' => 0,
                'id_category' => $_POST['categories'],
                'discount' => $_POST['discount'],
                'special' => 0
            ];

            $productModel->insert($data);

            $idProduct = $productModel->getLastId();

            $images = $_FILES['image_urls']['name'];

            foreach ($images as $image) {
                $productModel->insertImages($idProduct, $image);
            }
            
        }
        // echo '<pre>';
        //     print_r($idProduct);
        //     die;

        $this->renderAdmin(
            'products/create',
            [
                'allCategories' => $allCategory

            ]
        );
    }
}