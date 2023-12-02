<?php
namespace MVC_DA1\Controllers\Admin;

use MVC_DA1\Controller;
use MVC_DA1\Models\Categories_Properties;

class ProductPropertiesController extends Controller
{
    public function index()
    {
        $allCategories_Properties = (new Categories_Properties())->all();

        $this->renderAdmin("productProperties/index", [
            'allCategories_Properties' => $allCategories_Properties
        ]);
    }
    public function create()
    {
        $this->renderAdmin("productProperties/create");
    }
    public function update()
    {
        $this->renderAdmin("productProperties/update");
    }
    public function delete()
    {
        $this->renderAdmin("productProperties/delete");
    }
}
?>