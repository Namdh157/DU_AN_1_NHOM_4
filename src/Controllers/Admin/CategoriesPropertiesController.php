<?php

namespace MVC_DA1\Controllers\Admin;

use MVC_DA1\Controller;
use MVC_DA1\Models\BillDetail;
use MVC_DA1\Models\Categories_Properties;
use MVC_DA1\Models\Product;

class CategoriesPropertiesController extends Controller
{
    public function index()
    {
        $allCategories_Properties = (new Categories_Properties())->getAll();

        $this->renderAdmin("categoriesProperties/index", [
            'allCategories_Properties' => $allCategories_Properties

        ]);
    }
    public function create()
    {
        if(isset($_POST['btn-submit'])) {
            $data = [
                'color' => $_POST['color'],
                'size' => $_POST['size'],
                'price' => $_POST['price'],
                'quantity' => $_POST['quantity']
            ];
            (new Categories_Properties())->insert($data);

            header('Location: /admin/categoriesProductsProperties');
        }
        $this->renderAdmin("categoriesProperties/create");
    }
    public function update()
    {
        $id = $_GET['id'];
        $categoriesProperties = (new Categories_Properties())->findOne($id);
        $allProduct = (new Product())->all();

        if(isset($_POST['btn-submit'])) {
            $data = [
                'size' => $_POST['size'],
                'color' => $_POST['color'],
                'price' => $_POST['price'],
                'quantity' => $_POST['quantity'],
                'id_product' => $_POST['idProduct']
            ];
            $conditions = [
                ['id', '=', $id],
            ];
            (new Categories_Properties())->update($data, $conditions);

            header('Location: /admin/categoriesProductsProperties');
        }
        $this->renderAdmin("categoriesProperties/update",[
            'categoriesProperties' => $categoriesProperties,
            'allProduct' => $allProduct
        ]);
    }
    public function delete()
    {
        $conditions = [
            ['id', '=', $_GET['id']],
        ];

        $conditions2 = [
            ['id_productProperties', '=', $_GET['id']],
        ];

        (new BillDetail)->delete($conditions2);

        (new Categories_Properties())->delete($conditions);

        header('Location: /admin/categoriesProductsProperties');
    }
}
