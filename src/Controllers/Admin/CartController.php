<?php

namespace MVC_DA1\Controllers\Admin;

use MVC_DA1\Controller;
use MVC_DA1\Models\Cart;
use MVC_DA1\Models\Product;
use MVC_DA1\Models\User;

class CartController extends Controller
{
    protected $allProduct;

    protected $allUser;

    protected $cartCurrent;

    public function __construct()
    {

        $id = $_GET['id'];

        $this->allProduct = (new Product)->all();

        $this->allUser = (new User)->all();

        $this->cartCurrent = (new Cart)->findOne($id);
    }

    public function index()
    {
        $cartsModel = (new Cart)->joinTable(
            $addColumn = [
                ['cart.id', 'cart_id']
            ],
            $connect = [
                ['category', 'products', 'category.id', 'products.id_category'],
                ['cart', 'cart', 'products.id', 'cart.id_product'],
                ['users', 'cart', 'users.id', 'cart.id_user']

            ],
        );

        $this->renderAdmin('carts/index', ['showData' => $cartsModel]);
    }

    public function create()
    {
        if (isset($_POST['btn-submit'])) {
            $data = [
                'id_product' => $_POST['id_product'],
                'quantity' => $_POST['quantity'],
                'id_user' => $_POST['id_user'],
                'time' => $_POST['time'],
            ];

            (new Cart)->insert($data);

            header('Location: /admin/carts');
        }

        $this->renderAdmin('carts/create',[
            'allProduct' => $this->allProduct,
            'allUser' => $this->allUser,
            'cartCurrent' => $this->cartCurrent,
        ]);
    }

    public function update()
    {
        
        if (isset($_POST['btn-submit'])) {
            $data = [
                'id_product' => $_POST['id_product'],
                'quantity' => $_POST['quantity'],
                'id_user' => $_POST['id_user'],
                'time' => $_POST['time'],
            ];

            $conditions = [
                ['id', '=', $_GET['id']]
            ];

            (new Cart)->update($data, $conditions);

            header('Location: /admin/carts');
        }


        $this->renderAdmin('carts/update', [
            'allProduct' => $this->allProduct,
            'allUser' => $this->allUser,
      
        ]);
    }

    public function delete()
    {
        $conditions = [
            ['id', '=', $_GET['id']]
        ];
        
        (new Cart)->delete($conditions);

        header('Location: /admin/carts');
    }
}