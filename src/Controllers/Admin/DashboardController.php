<?php

namespace MVC_DA1\Controllers\Admin;

use MVC_DA1\Controller;
use MVC_DA1\Models\Bills;
use MVC_DA1\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $countChar = (new Category())->countChar();
        $label = [];
        $datas = [];
        foreach ($countChar as $count) {
            array_push($label, $count['name_category']);
            array_push($datas, $count['COUNT']);
        }
        $time = date('h:i:s', time());
        $countOrder = (new Bills)->countBills();
        $this->renderAdmin('dashboard', [
            'title' => 'Dashboard',
            'label' => $label,
            'datas' => $datas,
            'time' => $time,
            'countOrder' => $countOrder

        ]);
    }
}
