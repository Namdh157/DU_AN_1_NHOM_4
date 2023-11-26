<?php

namespace MVC_DA1\Controllers\Client;

use MVC_DA1\Controller;
use MVC_DA1\Models\Product;
use MVC_DA1\Models\Category;
use MVC_DA1\Models\User;

class HomeController extends Controller
{
    /*
        Đây là hàm hiển thị danh sách user
    */
    public function index()
    {
        $categories = (new Category())->all();
        $productSeller = (new Product())->joinTable(
            $addColumn = [
                ['products.id', 'product_detail']
            ],
            $connect = [
                ['category', 'products.id_category', 'category.id']
            ],
            $condition = [],
            $orderBy = [
                ['products.view', 'DESC', 12]
            ]
        );
        $productDiscount = (new Product())->joinTable(
            $addColumn = [
                ['products.id', 'product_detail']
            ],
            $connect = [
                ['category', 'products.id_category', 'category.id']
            ],
            $condition = [],

            $orderBy = [
                ['products.discount', 'DESC', 9]
            ]
        );
        // unset($_SESSION['account']);
        // echo '<pre>';
        // print_r($_SESSION);
        // die;
 
        $this->render('home', [
            'categories' => $categories,
            'productSeller' => $productSeller,
            'productDiscount' => $productDiscount,
            'allCategories' => $this->allCategories

        ]);
    }

    public function categories()
    {
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

        $this->render('Categories/index', [
            'categoryCurrent' => $categoryCurrent,
            'categories' => $categories,
            'categoryProduct' => $categoryProduct,
            'countProduct' => $countProduct,
            'allCategories' => $this->allCategories

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

        $productCurrent = (new Product())->joinTable(
            $addColumn = [],
            $connect = [['category', 'products.id_category', 'category.id']],
            $conditions = [['products.id', '=', $id]],
            $orderBy = []
        );





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
        
        // echo '<pre>';
        // print_r($countSearch);
        // die;
        $this->render('AllProducts/index',$data = [
            'countSearch' => $countSearch,
            'allProducts' => $products,
            'allCategories' => $this->allCategories
            
        ]);


    }
}
