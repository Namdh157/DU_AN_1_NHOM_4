<?php

namespace MVC_DA1\Controllers;

use MVC_DA1\Models\BillDetail;
use MVC_DA1\Models\Bills;
use MVC_DA1\Models\Cart;
use MVC_DA1\Models\Categories_Properties;
use MVC_DA1\Models\Comment;
use MVC_DA1\Models\Images;
use MVC_DA1\Models\Product;
use MVC_DA1\Models\User;

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
        $size = $_POST["size"];
        $color = $_POST["color"];

        if (!isset($_SESSION['account'])) {
            $id_categoriesProperties = (new Categories_Properties)->getId($color, $size, $idProduct);
            $product = (new Cart)->getProductByProperties($id_categoriesProperties);

            $_SESSION['cart'][] = [
                'quantity' => $quantity,
                'product' => $product,
                'totalPrice' => $product['unit_price'] * $quantity,
            ];

            foreach ($_SESSION['cart'] as $item) {
                if (isset($item['totalPrice'])) {
                    $_SESSION['totalCart'] += $item['totalPrice'];
                }
            }
            $data = [
                'countCart' => count($_SESSION['cart']),
                'totalCart' => number_format($_SESSION['totalCart'], 0, '.', ',')
            ];
            echo json_encode($data);
        } else {

            $id_categoriesProperties = (new Categories_Properties)->getId($color, $size, $idProduct);
            $data = [
                'id_product' => (int)$idProduct,
                'quantity' => (int)$quantity,
                'id_user' => (int)$idUser,
                'status' => 0,
                'time' => date('Y-m-d H:i:s'),
                'id_properties' => $id_categoriesProperties
            ];

            (new Cart)->insert($data);
            $countCart = (new Cart)->countCart($idUser);
            $totalCart = (new Cart)->totalCart($idUser);

            $datas = [
                'countCart' => $countCart,
                'totalCart' => number_format($totalCart, 0, '.', ',')
            ];
            echo json_encode($datas);
        }
    }

    public function profile()
    {
        if (isset($_POST['name'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $phone = $_POST['phone'];
            $image = $_FILES['image'];
            $id = $_SESSION['account']['id_user'];
            $user = (new User)->getById($id);
            if ($image['name'] == "") {
                $image = $user['image_user'];
            } else {
                move_uploaded_file($image['tmp_name'], "assets/files/assets/images/" . $image['name']);
                $image = $image['name'];
            }
            $data = [
                'name' => $name,
                'email' => $email,
                'address' => $address,
                'phone' => $phone,
                'image' => $image
            ];
            (new User)->update($id, $data);
            echo json_encode($image);
        }
    }




    public function order()
    {
        // Chưa đăng nhập
        if (isset($_SESSION['cart'])) {
            if (isset($_POST['totalPrice'])) {
                $quantity = $_POST['quantity'];
                $orderId = $_POST['orderId'];
                $_SESSION['cart'][$orderId]['quantity'] = $quantity;
                $_SESSION['cart'][$orderId]['totalPrice'] = $_SESSION['cart'][$orderId]['product']['unit_price'] * $quantity;
                $_SESSION['totalCart'] = 0;
                foreach ($_SESSION['cart'] as $item) {
                    if (isset($item['totalPrice'])) {
                        $_SESSION['totalCart'] += $item['totalPrice'];
                    }
                }
                $data = [
                    'totalPrice' => number_format($_SESSION['cart'][$orderId]['totalPrice'], 0, '.', ','),
                    'totalCart' => number_format($_SESSION['totalCart'], 0, '.', ','),
                    'orderId' => $orderId
                ];
                echo json_encode($data);
            }

            if (isset($_POST['delete'])) {
                $orderId = $_POST['orderId'];
                unset($_SESSION['cart'][$orderId]);
                $_SESSION['totalCart'] = 0;
                foreach ($_SESSION['cart'] as $item) {
                    if (isset($item['totalPrice'])) {
                        $_SESSION['totalCart'] += $item['totalPrice'];
                    }
                }
                $data = [
                    'totalCart' => number_format($_SESSION['totalCart'], 0, '.', ','),
                    'orderId' => $orderId
                ];
                echo json_encode($data);
            }

            if (isset($_POST['pay'])) {
                $orderIds = $_POST['orderIds'];
                $data = [
                    'id_user' => 0,
                    'name_user' => $_POST['nameUser'],
                    'price' => $_SESSION['totalCart'],
                    'phone' => $_POST['phone'],
                    'address' => $_POST['address'],
                    'status' => 0,
                    'pay_method' => $_POST['pay_method'],
                    'time_create' => date('Y-m-d H:i:s'),
                    'time_update' => date('Y-m-d H:i:s'),
                    'note' => $_POST['note']
                ];
                (new Bills)->insert($data);
                $id_bill = (new Bills)->getLastId();
                foreach ($orderIds as $orderId) {
                    $data1 = [
                        'id_bills' => $id_bill,
                        'id_productProperties' => $_SESSION['cart'][$orderId]['product']['id'],
                        'price' => $_SESSION['cart'][$orderId]['totalPrice'],
                        'quantity' => $_SESSION['cart'][$orderId]['quantity']
                    ];
                    (new BillDetail)->insert($data1);

                }
                unset($_SESSION['cart']);
                $_SESSION['totalCart'] = 0;
                echo json_encode($data);
            }
        } else {
            // Đã đăng nhập
            if (isset($_POST['pay'])) {
                $orderIds = $_POST['orderIds'];
                $idUser = $_SESSION['account']['id_user'];
                $totalCart = (new Cart)->totalCart($idUser);
                $data = [
                    'id_user' => $idUser,
                    'name_user' => $_POST['nameUser'],
                    'price' => $totalCart,
                    'phone' => $_POST['phone'],
                    'address' => $_POST['address'],
                    'status' => 0,
                    'pay_method' => $_POST['pay_method'],
                    'time_create' => date('Y-m-d H:i:s'),
                    'time_update' => date('Y-m-d H:i:s'),
                    'note' => $_POST['note']
                ];
                (new Bills)->insert($data);
                $id_bill = (new Bills)->getLastId();
                $allProductsInCart = (new cart)->allCartBYUser($idUser);
                foreach ($orderIds as $orderId) {
                    $data1 = [
                        'id_bills' => $id_bill,
                        'id_productProperties' => $allProductsInCart[$orderId]['properties_id'],
                        'price' => $allProductsInCart[$orderId]['total_price'],
                        'quantity' => $allProductsInCart[$orderId]['quantity']
                    ];
                    (new BillDetail)->insert($data1);
                    (new Cart)->delete([
                        ['id', '=', $allProductsInCart[$orderId]['order_id']]
                    ]);
                }

                echo json_encode($data);
            }

            if (isset($_POST['delete'])) {
                $orderId = $_POST['orderId'];
                (new Cart)->delete([
                    ['id', '=', $orderId]
                ]);
                $countCart = (new Cart)->countCart($_POST['userId']);
                $totalCart = (new Cart)->totalCart($_POST['userId']);
                $data = [
                    'countCart' => $countCart,
                    'totalCart' => number_format($totalCart, 0, '.', ','),
                    'orderId' => $orderId
                ];
                echo json_encode($data);
            }

            if (isset($_POST['totalPrice'])) {
                $idUser = $_POST['userId'];
                $quantity = $_POST['quantity'];
                $orderId = $_POST['orderId'];
                (new Cart)->updateQuantity($orderId, $quantity);
                $totalCart = (new Cart)->totalCart($idUser);
                $data = [
                    'totalPrice' => number_format($totalCart, 0, '.', ','),
                    'totalCart' => number_format($totalCart, 0, '.', ','),
                    'orderId' => $orderId
                ];
                echo json_encode($data);
            }
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

    public function billDetail()
    {
        if (isset($_POST['idBill'])) {
            $idBill = $_POST['idBill'];
            $data = (new BillDetail)->getProductBillDetail($idBill);
            echo json_encode($data);
        }
    }
}
