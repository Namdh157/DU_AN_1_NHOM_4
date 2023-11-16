<?php

namespace MVC_DA1\Controllers\Admin;

use MVC_DA1\Controller;

class DashboardController extends Controller
{
    /*
        Đây là hàm hiển thị danh sách user
    */
    public function index() {        
        $this->renderAdmin('dashboard');
    }
}