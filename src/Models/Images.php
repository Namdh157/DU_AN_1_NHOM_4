<?php
namespace MVC_DA1\Models;

use MVC_DA1\Model;

class Images extends Model{
    protected $table = 'products_images';

    protected $columns = [
        'id_products',
        'image_url',
    ];

    public function getByProductId($id) {
        $sql = "SELECT * FROM products_images WHERE id_products = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([$id]);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


    
}

?>