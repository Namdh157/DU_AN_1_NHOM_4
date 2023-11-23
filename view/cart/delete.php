<?php
require_once '../../model/cart.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
}
deleteOrder($id, 'id_cart');
header("location:/PHP_basic/DU_AN_MAU/index.php?type=Cart");
?>