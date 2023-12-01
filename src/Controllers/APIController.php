<?php

namespace MVC_DA1\Controllers;

use MVC_DA1\Models\Cart;
use MVC_DA1\Models\Categories_Properties;
use MVC_DA1\Models\Images;
use MVC_DA1\Models\Product_properties;

class APIController
{

    public function products()
    {
        //hiện thi thuộc tính
        if (isset($_POST['renderData'])) {
            $productId = $_POST['productId'];
            $allProductProperties = (new Product_properties)->getProperties($productId);
            $allImages = (new Images)->getByProductId($productId);

            $data = [
                "allImages" => $allImages,
                "allProductProperties" => $allProductProperties
            ];
            header('Content-Type: application/json');
            echo json_encode($data);
        }
        //thêm thuộc tính ảnh
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

        //xóa thuộc tính ảnh
        if (isset($_POST['deleteImage'])) {
            $idImage = $_POST["idImage"];
            (new Images)->deleteImage($idImage);
            echo json_encode($idImage);
        }

        //Thêm thuộc tính màu sắc kích thước giá, số lượng
        if (isset($_POST['addProperties'])) {
            $item = [
                'product_id' => $_POST['productId'],
                'id_categories_properties' => $_POST['idProperties'],
            ];

            $data = (new Categories_Properties)->getData($item['id_categories_properties']);

            $allProductProperties = (new Product_properties)->getPropertiesById($_POST['productId']);
            $array = [];
            foreach ($allProductProperties as $value) {
                $array[] = $value['id_categories_properties'];
            }
            if (in_array($item['id_categories_properties'], $array)) {
                echo json_encode("error");
            } else {
                (new Product_properties)->insert($item);
                echo json_encode($data);
            }
        }

        //xóa thuộc tính màu sắc kích thước giá, số lượng
        if (isset($_POST['deleteProperties'])) {
            $idProperties = $_POST["idProperties"];
            (new Product_properties)->delete([
                ['id', '=', (int)$idProperties]
            ]);
        }
    }
    public function carts()
    {
        $idProduct = $_POST["idProduct"];
        $idUser = $_POST["idUser"];
        $size = $_POST["size"];
        $color = $_POST["color"];
        $quantity = $_POST["quantity"];

        $id_productProperty = (new Categories_Properties)->getId($color, $size)['id'];

        $data = [
            'id_product' => (int)$idProduct,
            'quantity' => (int)$quantity,
            'id_user' => (int)$idUser,
            'id_productProperty' => $id_productProperty
        ];
        (new Cart)->insert($data);
        $countCart = (new Cart)->countCart($idUser);

        echo json_encode($countCart);
    }
}
