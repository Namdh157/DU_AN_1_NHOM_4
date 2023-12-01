<?php

namespace MVC_DA1\Models;

use MVC_DA1\Model;

class Cart extends Model {
    protected $table = 'cart';
    protected $columns = [
        'id_product',
        'quantity',
        'id_user',
        'id_productProperty'
    ];

    public function countCart($id) {
        $sql = "SELECT COUNT(*) AS countCart FROM {$this->table} WHERE id_user = :id_user";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':id_user', $id);

        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC)['countCart'];
        
    }


}