<?php

namespace MVC_DA1\Models;

use MVC_DA1\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $columns = [
        'name_category',
    ];

    public function countChar()
    {
        $sql = "SELECT
        category.name_category,
        COUNT(products.id_category) COUNT
    FROM
        products
    JOIN category ON products.id_category = category.id
    GROUP BY
        products.id_category";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }
}
