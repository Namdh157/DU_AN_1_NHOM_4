<?php

namespace MVC_DA1\Models;

use MVC_DA1\Model;

class Cart extends Model
{
    protected $table = 'order_user';
    protected $columns = [
        'id_product',
        'quantity',
        'id_user',
        'status',
        'time',
        'id_properties'
    ];

    public function countCart($id)
    {
        $sql = "SELECT COUNT(*) AS countCart FROM {$this->table} WHERE id_user = :id_user AND status = 0";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':id_user', $id);

        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC)['countCart'];
    }

    public function allCartBYUser($id)
    {
        $sql = "SELECT
        ou.id AS order_id,
        p.id AS product_id,
        p.name_product AS product_name,
        p.discount AS product_discount,
        cp.size,
        cp.color,
        cp.price AS unit_price,
        ou.quantity,
        (cp.price * ou.quantity) AS total_price,
        SUBSTRING_INDEX(GROUP_CONCAT(DISTINCT PI.image_url), ',', 1) AS image_url
    FROM
        order_user ou
    JOIN products p ON
        ou.id_product = p.id
    JOIN categories_properties cp ON
        ou.id_properties = cp.id
    JOIN products_images PI ON
        p.id = PI.id_products
    WHERE
        ou.id_user = :id AND ou.status = 0
    GROUP BY
        ou.id, p.id, cp.size, cp.color, ou.quantity;
    
    ";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function allCart() {
        $sql = "SELECT
        ou.id AS order_id,
        p.id AS product_id,
        p.name_product AS product_name,
        p.discount AS product_discount,
        cp.size,
        cp.color,
        cp.price AS unit_price,
        ou.quantity,
        (cp.price * ou.quantity) AS total_price,
        SUBSTRING_INDEX(GROUP_CONCAT(DISTINCT PI.image_url), ',', 1) AS image_url
    FROM
        order_user ou
    JOIN products p ON
        ou.id_product = p.id
    JOIN categories_properties cp ON
        ou.id_properties = cp.id
    JOIN products_images PI ON
        p.id = PI.id_products
    GROUP BY
        ou.id, p.id, cp.size, cp.color, ou.quantity;
    
    ";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    function totalCart($id)
    {
        $sql = "SELECT
        SUM(cp.price * ou.quantity) AS total_cart_price
    FROM
        order_user ou
    JOIN products p ON
        ou.id_product = p.id
    JOIN categories_properties cp ON
        ou.id_properties = cp.id
    WHERE
        ou.id_user = :id AND ou.status = 0;
    ";
    
            $stmt = $this->conn->prepare($sql);
    
            $stmt->bindParam(':id', $id);
    
            $stmt->execute();
    
            return $stmt->fetch(\PDO::FETCH_ASSOC)['total_cart_price'];
    }

    function pay($id){
        $sql = "UPDATE order_user SET status = 1 WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':id', $id);
        
        $stmt->execute();
    }
}
