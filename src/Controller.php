<?php

namespace MVC_DA1;

use MVC_DA1\Models\Category;

class Controller {

    protected $allCategories;

    public function __construct()
    {
        $this->allCategories = (new Category)->all();
        
    }

    protected function render($view, $data = []) {
        $data['view'] = $view; 
        extract($data);

        include "Views/client/master.php";
    }
    protected function renderAdmin($view, $data = []) {
        $data['view'] = $view; 
        extract($data);

        include "Views/admin/master.php";
    }

    protected function render1($view, $data = []) {
        

        include "Views/client/$view.php";
    }
    
}