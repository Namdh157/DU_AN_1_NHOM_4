<?php
namespace MVC_DA1\Controllers;

use MVC_DA1\Models\Images;
use MVC_DA1\Models\Product;
use MVC_DA1\Models\Product_properties;
class APIController {

    public function products() {
        if(isset($_POST['getImages'])) {
            $productId = $_POST['productId'];
        
            $allProperties = (new Product_properties)->getProperties($productId);
            $allImages = (new Images)->getByProductId($productId);
    
            $data = [
                "allProperties" => $allProperties,
                "allImages" => $allImages
            ];
            echo json_encode($data);
        }
        if(isset($_POST['deleteImage'])) {

        }

        if(isset($_POST['addImages'])) {

        }
       
    }

    
}
?>