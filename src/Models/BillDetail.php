<?php

namespace MVC_DA1\Models;

use MVC_DA1\Model;

class BillDetail extends Model
{
    protected $table = 'bill_detail';
    protected $columns = [
        'id_bills',
        'id_productProperties',
        'price',
        'quantity',
    ];

    public function getProductBillDetail($id)
    {
        $sql = " SELECT
        p.name_product,
        cp.size,
        cp.color,
        bd.price,
        bd.quantity,
        pi.image_url
    FROM
        bill_detail bd
    JOIN
        categories_properties cp ON bd.id_productProperties = cp.id
    JOIN
        products p ON cp.id_product = p.id
    JOIN
        products_images pi ON p.id = pi.id_products
    WHERE
        bd.id_bills = :id;
    ";
        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(':id', $id);

        $stmt->execute();
        
        return $stmt->fetchAll();

    }
}
