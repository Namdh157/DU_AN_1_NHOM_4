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

        $sql = "SELECT
        *,
        products.id AS product_id,
        category.name_category,
        images.image_urls
    FROM
        products
    JOIN
        category ON products.id_category = category.id
    LEFT JOIN (
        SELECT
            id_products,
            GROUP_CONCAT(image_url) AS image_urls
        FROM
            products_images
        GROUP BY
            id_products
    ) AS images ON products.id = images.id_products
    LEFT JOIN
        products_properties ON products.id = products_properties.product_id
    LEFT JOIN
        categories_properties ON products_properties.id_categories_properties = categories_properties.id";

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
        *,
        products.id AS product_id,
        category.name_category,
        images.image_urls
    FROM
        products
    JOIN
        category ON products.id_category = category.id
    LEFT JOIN (
        SELECT
            id_products,
            GROUP_CONCAT(image_url) AS image_urls
        FROM
            products_images
        GROUP BY
            id_products
    ) AS images ON products.id = images.id_products
    LEFT JOIN
        products_properties ON products.id = products_properties.product_id
    LEFT JOIN
        categories_properties ON products_properties.id_categories_properties = categories_properties.id
    WHERE products.id = :id";


        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function categoryProduct($id, $conditions  = [])
    {
        $sql = "SELECT
        *,
        products.id AS product_id,
        category.name_category,
        images.image_urls
    FROM
        products
    JOIN
        category ON products.id_category = category.id
    LEFT JOIN (
        SELECT
            id_products,
            GROUP_CONCAT(image_url) AS image_urls
        FROM
            products_images
        GROUP BY
            id_products
    ) AS images ON products.id = images.id_products
    LEFT JOIN
        products_properties ON products.id = products_properties.product_id
    LEFT JOIN
        categories_properties ON products_properties.id_categories_properties = categories_properties.id";



        $where = [];
        foreach ($conditions as $condition) {
            $where[] = "{$condition[0]} {$condition[1]} $id";
        }
        $where = ' WHERE ' . implode(" ", $where);

        $sql .= $where;

       


        $stmt = $this->conn->prepare($sql);

        // $stmt->bindParam("{$id}", $id);

        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_ASSOC);

        return $stmt->fetchAll();
    }

    public function cartProduct($id, $conditions  = [])
    {
        $sql = "SELECT
        *,
        products.id AS product_id,
        category.name_category,
        images.image_urls
        FROM
        products
        JOIN
        category ON products.id_category = category.id
        LEFT JOIN (
        SELECT
        id_products,
        GROUP_CONCAT(image_url) AS image_urls
        FROM
        products_images
        GROUP BY
        id_products
        ) AS images ON products.id = images.id_products
        LEFT JOIN
        products_properties ON products.id = products_properties.product_id
        LEFT JOIN
        categories_properties ON products_properties.id_categories_properties = categories_properties.id
        LEFT JOIN
        cart ON products.id = cart.id_product"; 

        
$where = [];
foreach ($conditions as $condition) {
    $where[] = "{$condition[0]} {$condition[1]} $id";
}
$where = ' WHERE ' . implode(" ", $where);

$sql .= $where;




$stmt = $this->conn->prepare($sql);

// $stmt->bindParam("{$id}", $id);

$stmt->execute();

$stmt->setFetchMode(\PDO::FETCH_ASSOC);

return $stmt->fetchAll();
      

    //   echo '<pre>';
    //   print_r($sql);
    //   die;
}
}
