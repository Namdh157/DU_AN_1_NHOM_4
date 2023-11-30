<?php

namespace MVC_DA1;

class Controller {

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