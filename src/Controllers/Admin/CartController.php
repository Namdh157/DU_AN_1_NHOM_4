<?php

namespace MVC_DA1\Controllers\Admin;

use MVC_DA1\Controller;
use MVC_DA1\Models\Cart;


class CartController extends Controller
{
    /*
        Đây là hàm hiển thị danh sách user
    */
    public function index() {
        $cartsModel = (new Cart)->joinTable($connect = [
            ['category', 'products', 'category.id', 'products.id_category'],
            ['cart', 'cart', 'products.id', 'cart.id_product'],
            ['users', 'cart', 'users.id', 'cart.id_user']

        ],);
        
        
        $this->renderAdmin('carts/index', ['showData' => $cartsModel]);
    }

    public function create() {
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

        $this->renderAdmin('carts/create');
    }

    public function update() {

        $cartCurrent = (new Cart)->joinTable($connect = [
            ['products', 'cart', 'products.id', 'cart.id_product'],
            ['users', 'cart', 'users.id', 'cart.id_user']
        ],
       
        $conditions = [
            ['cart.id', '=', $_GET['id']]
        ]);

        $cartsModel = (new Cart)->joinTable($connect = [
            ['category', 'products', 'category.id', 'products.id_category'],
            ['cart', 'cart', 'products.id', 'cart.id_product'],
            ['users', 'cart', 'users.id', 'cart.id_user']

        ],);
        

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
        }
        
        $this->renderAdmin('carts/update', [
            'cart' => $cartCurrent,
            'allCart' => $cartsModel
        ]);
    }

    public function delete() {
        $conditions = [
            ['id', '=', $_GET['id']]
        ];

        (new Cart)->delete($conditions);

        header('Location: /admin/carts');
    }
}
