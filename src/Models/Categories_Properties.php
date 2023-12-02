<?php
namespace MVC_DA1\Models;
use MVC_DA1\Model;

class Categories_Properties extends Model
{
    protected $table = 'categories_properties';
    protected $columns = [
        'size',
        'color',
        'price',
        'quantity',
    ];

    public function getData($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_ASSOC);

        return $stmt->fetch();
    }

    public function getId($color, $size) {
        $sql = "SELECT id FROM categories_properties WHERE color = ? AND size = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([$color, $size]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    
}
?>