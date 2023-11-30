<?php

namespace MVC_DA1\Controllers\Client;

use MVC_DA1\Controller;
use MVC_DA1\Models\Product;
use MVC_DA1\Models\Category;
use MVC_DA1\Models\User;

class HomeController extends Controller
{
    protected $allCategories;

    public function __construct() {
        $this->allCategories = (new Category)->all();
    }
    public function index()
    {
        $productSeller = (new Product())->allProductsTypes(
            $orderBy = [
                ['products.view', 'DESC', 12]
            ]
        );
        
        foreach ($productSeller as $key => &$products) {
            if (!empty($products['image_urls'])) {
                $products['image_urls'] = explode(",", $products['image_urls']);
            }

            if (!empty($products['sizes'])) {
                $products['sizes'] = explode(",", $products['sizes']);
            }

            if (!empty($products['colors'])) {
                $products['colors'] = explode(",", $products['colors']);
            }
        }
        
        $productDiscount = (new Product())->allProductsTypes(
            $orderBy = [
                ['products.discount', 'DESC', 9]
            ]
        );

        foreach ($productDiscount as $key => &$products) {
            if (!empty($products['image_urls'])) {
                $products['image_urls'] = explode(",", $products['image_urls']);
            }

            if (!empty($products['sizes'])) {
                $products['sizes'] = explode(",", $products['sizes']);
            }

            if (!empty($products['colors'])) {
                $products['colors'] = explode(",", $products['colors']);
            }
        }
        // echo "<pre>";
        // print_r($productSeller);
        // die;
        $this->render('home', [
            'allCategories' => $this->allCategories,
            'productSeller' => $productSeller,
            'productDiscount' => $productDiscount,
        ]);
    }

    public function categories()
    {
        $id = $_GET['id'];
        $categoryCurrent = (new Category())->findOne($id);
        $categoryProduct = (new Product())->categoryProduct($id, 
        $addColumn = [
            ['products.id', 'product_detail']
        ], $connect = [
            ['products', 'category', 'products.id_category', 'category.id'],
        ],  $conditions = [
            ['products.id_category', '=']
        ]);

        $countProduct = (new Product())->countProduct($id);

        $this->render('Categories/index', [
            'categoryCurrent' => $categoryCurrent,
            'allCategories' => $this->allCategories,
            'categoryProduct' => $categoryProduct,
            'countProduct' => $countProduct,

        ]);
    }

    public function notification()
    {
        $this->render("notification", ['categories' => $this->allCategories]);
    }
    public function contact()
    {
        $this->render("contact", ['categories' => $this->allCategories]);
    }
    public function productDetail()
    {
        $id = $_GET['id'];
        $productCurrent = (new Product())->getProductCurrent($id);
        if($productCurrent['image_urls']) {
            $productCurrent['image_urls'] = explode(",", $productCurrent['image_urls']);
        }
        if($productCurrent['colors']) {
            $productCurrent['colors'] = explode(",", $productCurrent['colors']);
        }
        if($productCurrent['sizes']) {
            $productCurrent['sizes'] = explode(",", $productCurrent['sizes']);
        }
        // echo "<pre>";
        // print_r($productCurrent);
        // die;

        $this->render('ProductDetail/index', [
            'productCurrent' => $productCurrent,
            'allCategories' => $this->allCategories

        ]);
    }

    public function register()
    {
        if (isset($_POST['btnSave'])) {
            $data = [
                'user_name' => $_POST['nameUser'],
                'password' => $_POST['password'],
                'name' => $_POST['name'],
                'image' => $_FILES['image']['name'],
                'email' => $_POST['email'],
                'address' => $_POST['address'],
                'phone' => $_POST['phone'],
                'role' => 0,
            ];
            if (!empty($_FILES['image']['name'])) {
                $imageUrl = $_FILES['image']['name'];
                $fileUrl = 'assets/files/assets/images/';
                move_uploaded_file($_FILES['image']['tmp_name'], $fileUrl.$imageUrl);
            }
            (new User)->insert($data);

            header('location:/Login');
        }
        $this->render1('Authentication/register');
    }

    public function login()
    {
        if (isset($_POST['btnSave'])) {
            $data = [
                'user_name' => $_POST['user_name'],
                'password' => $_POST['password']
            ];

            $acc = (new User)->login($data);

            $_SESSION['account'] = [
                'id_user' =>  $acc['id'],
                'name' =>  $acc['name'],
                'image_user' => $acc['image'],
                'email' =>  $acc['email'],
                'address' => $acc['address'],
                'phone' => $acc['phone'],
                'role' => $acc['role'],
            ];
            header('Location:/');
        }
        $this->render1('Authentication/login');
    }
    public function logout(){
        unset($_SESSION['account']);
        header('location:/');
    }

    public function allProducts(){
        $search = $_GET['search'];
        $products = (new Product)->joinTable(
            $addColumn = [
                ['products.id', 'product_detail']
            ],
            $connect = [
                ['category', 'products.id_category', 'category.id']
            ],
            $condition = [
                ['products.name_product', 'LIKE',  "'%" . $search . "%'"]
            ],
            $orderBy = [
                ['products.id', 'DESC']
            ],
            );
        $countSearch = (new Product())->countSearch($search);
        
        $this->render('AllProducts/index',$data = [
            'countSearch' => $countSearch,
            'allProducts' => $products,
            'allCategories' => $this->allCategories
        ]);


    }
}
