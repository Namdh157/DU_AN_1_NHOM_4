<?php
namespace MVC_DA1\Models;
use MVC_DA1\Model;

class Product_properties extends Model{
    public function getProperties($id) {
        $sql = "SELECT color, size, id FROM products_properties WHERE product_id = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([$id]);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }
}
?>