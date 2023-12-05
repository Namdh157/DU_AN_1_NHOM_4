<?php

namespace MVC_DA1\Controllers;

use MVC_DA1\Models\Cart;
use MVC_DA1\Models\Categories_Properties;
use MVC_DA1\Models\Comment;
use MVC_DA1\Models\Images;
use MVC_DA1\Models\Product_properties;

class APIController
{

    public function products()
    {
        //hiện thi thuộc tính
        if (isset($_POST['renderData'])) {
            $productId = $_POST['productId'];
            $allProductProperties = (new Categories_Properties)->getProductProperties($productId);
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
                'size' => $_POST['size'],
                'color' => $_POST['color'],
                'price' => $_POST['price'],
                'quantity' => $_POST['quantity'],
                'id_product' => $_POST['productId']
            ];

            $data = (new Categories_Properties)->getCategories();

            if (in_array($item, $data)) {
                echo json_encode("error");
            } else {
                (new Categories_Properties)->insert($item);
                echo json_encode($item);
            }
        }

        //xóa thuộc tính màu sắc kích thước giá, số lượng
        if (isset($_POST['deleteProperties'])) {
            $idProperties = $_POST["idProperties"];
            (new Categories_Properties)->delete([
                ['id', '=', (int)$idProperties]
            ]);
        }
    }
    public function carts()
    {

        $idProduct = $_POST["idProduct"];
        $idUser = $_POST["idUser"];
        $quantity = $_POST["quantity"];

        if (isset($_POST['size']) && isset($_POST['color'])) {
            $size = $_POST["size"];
            $color = $_POST["color"];
            $id_categoriesProperties = (new Categories_Properties)->getId($color, $size);
            $data = [
                'id_product' => (int)$idProduct,
                'quantity' => (int)$quantity,
                'id_user' => (int)$idUser,
                'status' => 0,
                'time' => date('Y-m-d H:i:s'),
                'id_properties' => $id_categoriesProperties
            ];
        } else {
            $data = [
                'id_product' => (int)$idProduct,
                'quantity' => (int)$quantity,
                'id_user' => (int)$idUser,
                'status' => 0,
                'time' => date('Y-m-d H:i:s'),
                'id_properties' => 0
            ];
        }

        

        (new Cart)->insert($data);
        $countCart = (new Cart)->countCart($idUser);
        $totalCart = (new Cart)->totalCart($idUser);

        $datas = [
            'countCart' => $countCart,
            'totalCart' => $totalCart
        ];
        echo json_encode($datas);
    }

    public function order()
    {
        if (isset($_POST['pay'])) {
            $orderIds = $_POST['orderIds'];
            foreach ($orderIds as $orderId) {
                (new Cart)->pay($orderId);
            }
            echo json_encode('success');
        }
    }

    public function comments()
    {
        if (isset($_POST['btnComment'])) {
            $data = [
                'content' => $_POST['content'],
                'id_user' => $_POST['idUser'],
                'id_pro' => $_POST['idProduct'],
                'date_comment' => date('Y-m-d H:i:s')
            ];
            (new Comment)->insert($data);
            echo json_encode($data);
        }
    }
}