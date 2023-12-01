<?php

namespace MVC_DA1\Controllers\Admin;

use MVC_DA1\Controller;
use MVC_DA1\Models\Categories_Properties;
use MVC_DA1\Models\Category;
use MVC_DA1\Models\Product;

class ProductController extends Controller
{
    protected $allProducts;

    protected $productModel;

    protected $allCategories;

    public function __construct()
    {
        $this->productModel = (new Product);
        $this->allProducts = $this->productModel->allProductsTypes([['p.id', 'DESC']]);
        $this->allCategories = (new Category)->all();
    }
    public function index()
    {
        foreach ($this->allProducts as $key => &$products) {
            if (!empty($products['image_urls'])) {
                $products['image_urls'] = explode(",", $products['image_urls']);
            }
        }
        $allProductsProperties = (new Categories_Properties)->all();

        $this->renderAdmin(
            'products/index',
            [
                'products' => $this->allProducts,
                'allProductsProperties' => $allProductsProperties
            ]
        );
    }
    public function create()
    {
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

            $this->productModel->insert($data);

            $idProduct = $this->productModel->getLastId();

            $images = $_FILES['image_urls']['name'];

            foreach ($images as $image) {
                $this->productModel->insertImages($idProduct, $image);
            }
            
        }

        $this->renderAdmin(
            'products/create',
            [
                'allCategories' => $this->allCategories,

            ]
        );
    }

    public function update() {
        $id = $_GET['id'];

        $productCurrent = $this->productModel->getProductCurrent($id);

        if($productCurrent['image_urls']) {
            $productCurrent['image_urls'] = explode(",", $productCurrent['image_urls']);
        }
        if($productCurrent['colors']) {
            $productCurrent['colors'] = explode(",", $productCurrent['colors']);
        }
        if($productCurrent['sizes']) {
            $productCurrent['sizes'] = explode(",", $productCurrent['sizes']);
        }

        $this->renderAdmin('products/update', [
            'allCategories' => $this->allCategories,
            'productCurrent' => $productCurrent
        ]);
    }

    public function delete() {
        $conditions = [
            ['id', '=', $_GET['id']],
        ];
        
        (new Product())->delete($conditions);

        header('Location: /admin/products');
    }
}