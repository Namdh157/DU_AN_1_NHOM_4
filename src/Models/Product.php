<?php

namespace MVC_DA1\Models;

use MVC_DA1\Model;


class Product extends Model
{
    protected $table = 'products';
    protected $columns = [
        'name_product',
        'description',
        'view',
        'id_category',
        'discount',
        'special'
    ];
    public function allProductsTypes($orderBy = [])
    {

        $sql = "SELECT
        p.id AS product_id,
        p.id_category,
        p.name_product,
        p.description,
        p.view,
        c.name_category,
        p.discount,
        p.special,
        GROUP_CONCAT(DISTINCT cp.price) AS prices,
        GROUP_CONCAT(DISTINCT cp.quantity) AS quantities,
        GROUP_CONCAT(DISTINCT PI.image_url) AS image_urls
    FROM
        products p
    JOIN category c ON
        p.id_category = c.id
    LEFT JOIN categories_properties cp ON
        p.id = cp.id_product
    LEFT JOIN products_images PI ON
        p.id = PI.id_products
    GROUP BY
        p.id";

        if (!empty($orderBy)) {
            $addSql = [];
            foreach ($orderBy as $item) {
                $limit = empty($item[2]) ? "" : "LIMIT {$item[2]}";
                $addSql[] = " ORDER BY {$item[0]} {$item[1]} $limit";
            }

            $addSql = implode(" ", $addSql);
            $sql .= $addSql;
        }

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
    public function getProductCurrent($id)
    {

        $sql = "SELECT
        p.id AS product_id,
        p.id_category,
        p.name_product,
        p.description,
        p.view,
        c.name_category,
        p.discount,
        p.special,
        GROUP_CONCAT(DISTINCT cp.size) AS sizes,
        GROUP_CONCAT(DISTINCT cp.color) AS colors,
        GROUP_CONCAT(DISTINCT cp.price) AS prices,
        GROUP_CONCAT(DISTINCT cp.quantity) AS quantities,
        GROUP_CONCAT(DISTINCT PI.image_url) AS image_urls
    FROM
        products p
    JOIN category c ON
        p.id_category = c.id
    LEFT JOIN categories_properties cp ON
        p.id = cp.id_product
    LEFT JOIN products_images PI ON
        p.id = PI.id_products
        WHERE p.id = :id
    GROUP BY
        p.id ";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function categoryProduct($id, $conditions  = [])
    {
        
        $sql = "SELECT
        p.id AS product_id,
        p.id_category,
        p.name_product,
        p.description,
        p.view,
        c.name_category,
        p.discount,
        p.special,
        GROUP_CONCAT(DISTINCT cp.size) AS sizes,
        GROUP_CONCAT(DISTINCT cp.color) AS colors,
        GROUP_CONCAT(DISTINCT cp.price) AS prices,
        GROUP_CONCAT(DISTINCT cp.quantity) AS quantities,
        GROUP_CONCAT(DISTINCT PI.image_url) AS image_urls
    FROM
        products p
    JOIN category c ON
        p.id_category = c.id
    LEFT JOIN categories_properties cp ON
        p.id = cp.id_product
    LEFT JOIN products_images PI ON
        p.id = PI.id_products
    ";

        $where = [];
        foreach ($conditions as $condition) {
            $where[] = "{$condition[0]} {$condition[1]} $id";
        }
        $where = ' WHERE ' . implode(" ", $where);

        $sql .= $where." GROUP BY p.id";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_ASSOC);

        return $stmt->fetchAll();
    } 
}
