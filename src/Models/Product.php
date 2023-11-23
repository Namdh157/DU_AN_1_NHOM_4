<?php

namespace MVC_DA1\Models;

use MVC_DA1\Model;


class Product extends Model
{
    protected $table = 'products';
    protected $columns = [
        'name_product',
        'price',
        'description',
        'view',
        'id_category',
        'discount',
        'special'
    ];
    public function allProductsTypes($orderBy = [])
    {

        $sql = "SELECT *,
        category.name_category,
        images.image_urls,
        properties.colors,
        properties.sizes
    FROM
        products
    JOIN category ON products.id_category = category.id
    LEFT JOIN (
        SELECT
            id_products,
            GROUP_CONCAT(image_url) AS image_urls
        FROM
            products_images
        GROUP BY
            id_products
    ) AS images ON products.id = images.id_products
    LEFT JOIN (
        SELECT
            product_id,
            GROUP_CONCAT(color) AS colors,
            GROUP_CONCAT(size) AS sizes
        FROM
            products_properties
        GROUP BY
            product_id
    ) AS properties ON products.id = properties.product_id";

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
        // foreach ($conditions as &$condition) {
        //     $stmt->bindParam("{$condition[0]}", $condition[2]);
        // }
        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
}