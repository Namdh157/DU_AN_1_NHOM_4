<?php

namespace MVC_DA1\Controllers\Admin;

use MVC_DA1\Controller;
use MVC_DA1\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $productModel = (new Product)->allProductsTypes();
        foreach ($productModel as $key => &$products) {
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

        // echo '<pre>';
        // print_r($productModel);
        // die;
        $this->renderAdmin(
            'products/index',
            [
                'products' => $productModel

            ]
        );
    }
    public function create() {


        $this->renderAdmin(
            'products/create',
            []
        );
    }
}
