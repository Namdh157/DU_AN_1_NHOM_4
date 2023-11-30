<?php

namespace MVC_DA1\Controllers;

use MVC_DA1\Models\Images;
use MVC_DA1\Models\Product_properties;

class APIController
{

    public function products()
    {
        if (isset($_POST['renderData'])) {
            $productId = $_POST['productId'];

            $allProperties = (new Product_properties)->getProperties($productId);
            $allImages = (new Images)->getByProductId($productId);

            $data = [
                "allProperties" => $allProperties,
                "allImages" => $allImages
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
        }

        if (isset($_POST['addImages'])) {
            $productId = $_POST["productId"];
            $files = $_FILES["imageUrls"];
            $files_name = $files['name'];

            foreach ($files_name as $key => $file) {
                move_uploaded_file($files['tmp_name'][$key], "assets/files/assets/images/" . $file);
                (new Images)->uploadImages($productId, $file);
            }
            echo json_encode($files);

        }

        if (isset($_POST['deleteImage'])) {
            $idImage = $_POST["idImage"];
            (new Images)->deleteImage($idImage);
            echo json_encode($idImage);
        }
    }
}
