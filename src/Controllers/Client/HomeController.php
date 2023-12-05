<?php

namespace MVC_DA1\Controllers\Client;

use MVC_DA1\Controller;
use MVC_DA1\Models\Cart;

use MVC_DA1\Models\Categories_Properties;
use MVC_DA1\Models\Comment;
use MVC_DA1\Models\Product;
use MVC_DA1\Models\Category;
use MVC_DA1\Models\User;

class HomeController extends Controller
{
    protected $allCategories;

    protected $countCart;

    protected $totalCart;

    public function __construct()
    {
        $this->allCategories = (new Category)->all();
        if (isset($_SESSION['account'])) {
            $id = $_SESSION['account']['id_user'];
            $this->countCart = (new Cart)->countCart($id);
            $this->totalCart = (new Cart)->totalCart($id);
        } else {
            $this->countCart = 0;
            $this->totalCart = 0;
        }
    }
    public function index()
    {
        $productSeller = (new Product())->allProductsTypes(
            $orderBy = [
                ['p.view', 'DESC', 9]
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


            if (!empty($products['prices'])) {
                $products['prices'] = explode(",", $products['prices']);
            }

            if (!empty($products['quantities'])) {
                $products['quantities'] = explode(",", $products['quantities']);
            }
        }
        $productDiscount = (new Product())->allProductsTypes(
            $orderBy = [
                ['p.discount', 'DESC', 9]
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


            if (!empty($products['prices'])) {
                $products['prices'] = explode(",", $products['prices']);
            }

            if (!empty($products['quantities'])) {
                $products['quantities'] = explode(",", $products['quantities']);
            }
        }


        $this->render('home', [
            'allCategories' => $this->allCategories,
            'productSeller' => $productSeller,
            'productDiscount' => $productDiscount,
            'countCart' => $this->countCart,
            'totalCart' => $this->totalCart


        ]);
    }

    public function categories()
    {
        $id = $_GET['id'];
        $categoryCurrent = (new Category())->findOne($id);

        $categoryProduct = (new Product())->categoryProduct(
            $id,
            $conditions = [
                ['p.id_category', '=']
            ]
        );


        foreach ($categoryProduct as $key => &$products) {
            if (!empty($products['image_urls'])) {
                $products['image_urls'] = explode(",", $products['image_urls']);
            }

            if (!empty($products['sizes'])) {
                $products['sizes'] = explode(",", $products['sizes']);
            }

            if (!empty($products['colors'])) {
                $products['colors'] = explode(",", $products['colors']);
            }

            if (!empty($products['prices'])) {
                $products['prices'] = explode(",", $products['prices']);
            }

            if (!empty($products['quantities'])) {
                $products['quantities'] = explode(",", $products['quantities']);
            }
        }

        $countProduct = (new Product())->countProduct($id);


        $this->render('Categories/index', [
            'categoryCurrent' => $categoryCurrent,
            'allCategories' => $this->allCategories,
            'categoryProduct' => $categoryProduct,
            'countProduct' => $countProduct,
            'countCart' => $this->countCart,
            'totalCart' => $this->totalCart


        ]);
    }

    public function notification()
    {
        $this->render("notification", [
            'categories' => $this->allCategories,
            'allCategories' => $this->allCategories,
            'countCart' => $this->countCart,
            'totalCart' => $this->totalCart

        ]);
    }
    public function contact()
    {
        $this->render("contact", [
            'categories' => $this->allCategories,
            'allCategories' => $this->allCategories,
            'countCart' => $this->countCart,
            'totalCart' => $this->totalCart

        ]);
    }
    public function productDetail()
    {
        $id = $_GET['id'];
        $productCurrent = (new Product())->getProductCurrent($id);

        $allCategoriesProperties = (new Categories_Properties)->all();

        if ($productCurrent['image_urls']) {
            $productCurrent['image_urls'] = explode(",", $productCurrent['image_urls']);
        }
        if ($productCurrent['prices']) {
            $productCurrent['prices'] = explode(",", $productCurrent['prices']);
        }
        if ($productCurrent['sizes']) {
            $productCurrent['sizes'] = explode(",", $productCurrent['sizes']);
        }
        if ($productCurrent['colors']) {
            $productCurrent['colors'] = explode(",", $productCurrent['colors']);
        }
        if ($productCurrent['quantities']) {
            $productCurrent['quantities'] = explode(",", $productCurrent['quantities']);
        }

        $allComments = (new Comment)->allComment($id);


        $this->render('ProductDetail/index', [
            'productCurrent' => $productCurrent,
            'allCategories' => $this->allCategories,
            'countCart' => $this->countCart,
            'allCategoriesProperties' => json_encode($allCategoriesProperties),
            'allComments' => $allComments,
            'totalCart' => $this->totalCart

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
                move_uploaded_file($_FILES['image']['tmp_name'], $fileUrl . $imageUrl);
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
            if (empty($acc)) {
                echo "<script> alert('Tài khoản mật khẩu không chính xác')</script>";
            } else {
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
        $this->render1('Authentication/login');
    }
    public function logout()
    {
        unset($_SESSION['account']);
        header('location:/');
    }

    public function allProducts()
    {
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

        $this->render('AllProducts/index', $data = [
            'countSearch' => $countSearch,
            'allProducts' => $products,

            'allCategories' => $this->allCategories,
            'countCart' => $this->countCart,
            'totalCart' => $this->totalCart

        ]);
    }

    public function carts()
    {
        if (isset($_SESSION['account'])) {
            $id = $_SESSION['account']['id_user'];
            $allProductsInCart = (new cart)->allCartBYUser($id);
        } else {
            $allProductsInCart = [];
        }
        // echo "<pre>";
        // print_r( $allProductsInCart);
        // die;
        $this->render('Carts/index', $data = [
            'allCategories' => $this->allCategories,
            'allProductsInCart' => $allProductsInCart,
            'countCart' => $this->countCart,
            'totalCart' => $this->totalCart


        ]);
    }

    public function cartsDelete($id)
    {
        (new Cart)->delete($id);
        header('location:/Carts');
    }
}
