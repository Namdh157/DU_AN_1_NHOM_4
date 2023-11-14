<?php

namespace MVC_DA1\Controllers\Client;

use MVC_DA1\Controller;

class HomeController extends Controller
{
    /*
        Đây là hàm hiển thị danh sách user
    */
    public function index() {
        $this->render('client/home');
    }
}
