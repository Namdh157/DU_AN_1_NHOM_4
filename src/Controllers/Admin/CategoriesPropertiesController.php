<?php

namespace MVC_DA1\Controllers\Admin;

use MVC_DA1\Controller;
use MVC_DA1\Models\Categories_Properties;

class CategoriesPropertiesController extends Controller
{
    public function index()
    {
        $allCategories_Properties = (new Categories_Properties())->all();

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
                'price' => $_POST['price']
            ];
            (new Categories_Properties())->insert($data);
            header('Location: /admin/categoriesProductsProperties');
        }
        $this->renderAdmin("categoriesProperties/create");
    }
    public function update()
    {
        $this->renderAdmin("categoriesProperties/update");
    }
    public function delete()
    {
        $this->renderAdmin("categoriesProperties/delete");
    }
}
