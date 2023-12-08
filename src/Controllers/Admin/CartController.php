<?php

namespace MVC_DA1\Controllers\Admin;

use MVC_DA1\Controller;
use MVC_DA1\Models\BillDetail;
use MVC_DA1\Models\Bills;
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

        $this->cartCurrent = (new Bills)->findOne($id);
    }

    public function index()
    {
        $allOrder = (new Bills)->all();

        $this->renderAdmin('carts/index', [
            'showData' => $allOrder,
        ]);
    }


    public function update()
    {
        
        if (isset($_POST['btn-submit'])) {
            $id = $_GET['id'];
            $status = $_POST['status'];


            (new Bills)->updateBills($id, $status);

            header('Location: /admin/carts');
        }


        $this->renderAdmin('carts/update', [
            'allProduct' => $this->allProduct,
            'allUser' => $this->allUser,
            'cartCurrent' => $this->cartCurrent,

      
        ]);
    }

    public function delete()
    {
        $id = $_GET['id'];
        $conditions = [
            ['id', '=', $id]
        ];
        $conditions2 = [
            ['id_bills', '=', $id]
        ];
        
        (new BillDetail)->delete($conditions2);
        (new Bills)->delete($conditions);

        header('Location: /admin/carts');
    }
}