<?php

namespace MVC_DA1\Controllers\Client;

use MVC_DA1\Controller;
use MVC_DA1\Models\Product;
use MVC_DA1\Models\Category;

class HomeController extends Controller
{
    /*
        Đây là hàm hiển thị danh sách user
    */
    public function index()
    {
        $category = (new Category())->all();
        $productSeller = (new Product())->allProductsTypes(
            $orderBy = [
                ['products.view', 'DESC', 12]
            ]
        );
        $productDiscount = (new Product())->allProductsTypes(
            $orderBy = [
                ['products.discount', 'DESC', 9]
            ]
        );
        foreach ($productSeller as $key => &$products) {
            if(!empty($products['image_urls'])) {
                $products['image_urls'] = explode(",",$products['image_urls']);
            }
            
            if(!empty($products['sizes'])) {
                $products['sizes'] = explode(",",$products['sizes']);
            }

            if(!empty($products['color'])) {
                $products['color'] = explode(",",$products['color']);
            }
        }

        foreach ($productDiscount as $key => &$products) {
            if(!empty($products['image_urls'])) {
                $products['image_urls'] = explode(",",$products['image_urls']);
            }
            
            if(!empty($products['sizes'])) {
                $products['sizes'] = explode(",",$products['sizes']);
            }

            if(!empty($products['color'])) {
                $products['color'] = explode(",",$products['color']);
            }
        }
        $this->render('home', [
            'category' => $category,
            'productSeller' => $productSeller,
            'productDiscount' => $productDiscount
        ]);
    }
}
