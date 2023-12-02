<?php

namespace MVC_DA1\Models;

use MVC_DA1\Model;

class Product_properties extends Model
{

    protected $table = 'products_properties';

    protected $columns = [
        'product_id',
        'id_categories_properties'
    ];
    public function getProperties($id)
    {
        $sql = "SELECT *, products_properties.id as idProperties FROM products_properties 
        LEFT JOIN categories_properties ON 
        products_properties.id_categories_properties = categories_properties.id 
        WHERE products_properties.product_id = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([$id]);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getPropertiesById($id)
    {
        $sql = "SELECT * FROM products_properties WHERE product_id = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([$id]);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
}
