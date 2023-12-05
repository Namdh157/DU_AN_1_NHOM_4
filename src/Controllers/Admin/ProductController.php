<?php

namespace MVC_DA1\Controllers\Admin;

use MVC_DA1\Controller;
use MVC_DA1\Models\Categories_Properties;
use MVC_DA1\Models\Category;
use MVC_DA1\Models\Images;
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
                'description' => $_POST['description'],
                'view' => 0,
                'id_category' => $_POST['categories'],
                'discount' => $_POST['discount'],
                'special' => 0
            ];

            $this->productModel->insert($data);


            $idProduct = $this->productModel->getLastId();

            $properties = [
                'size' => $_POST['size'],
                'color' => $_POST['color'],
                'price' => $_POST['price'],
                'quantity' => $_POST['quantity'],
                'id_product' => $idProduct
            ];

            (new Categories_Properties)->insert($properties);


            $files = $_FILES['image_urls'];
            $files_name = $files['name'];

            foreach ($files_name as $key => $file) {
                move_uploaded_file($files['tmp_name'][$key], "assets/files/assets/images/" . $file);
                (new Images)->uploadImages($idProduct, $file);
            }

            // $images = $_FILES['image_urls']['name'];

            // foreach ($images as $image) {
            //     $this->productModel->insertImages($idProduct, $image);
            // }

            header('Location: /admin/products');
        }

        $this->renderAdmin(
            'products/create',
            [
                'allCategories' => $this->allCategories,
            ]
        );
    }

    public function update()
    {
        $id = $_GET['id'];

        $productCurrent = $this->productModel->getProductCurrent($id);
        $propertiesCurrent = (new Categories_Properties)->getPropertiesByProductId($id);

        if ($productCurrent['image_urls']) {
            $productCurrent['image_urls'] = explode(",", $productCurrent['image_urls']);
        }
        if ($productCurrent['colors']) {
            $productCurrent['colors'] = explode(",", $productCurrent['colors']);
        }
        if ($productCurrent['sizes']) {
            $productCurrent['sizes'] = explode(",", $productCurrent['sizes']);
        }

        if(isset($_POST['btn-submit'])) {
            $properties = [
                'size' => $_POST['size'],
                'color' => $_POST['color'],
                'price' => $_POST['price'],
                'quantity' => $_POST['quantity'],
                'id_product' => $id
            ];
            echo "<pre>";
            print_r($properties);
            die;
        }

        $this->renderAdmin('products/update', [
            'allCategories' => $this->allCategories,
            'productCurrent' => $productCurrent,
            'propertiesCurrent' => $propertiesCurrent
        ]);
    }

    public function delete()
    {
        $conditions = [
            ['id', '=', $_GET['id']],
        ];

        (new Product())->delete($conditions);

        header('Location: /admin/products');
    }
}