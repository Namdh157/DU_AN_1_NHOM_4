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
        'id_product'
    ];

    public function getAll() {
        $sql = "SELECT * FROM {$this->table} JOIN products ON products.id = categories_properties.id_product ORDER BY categories_properties.id DESC";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_ASSOC);

        return $stmt->fetchAll();

    }

    public function getData($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_ASSOC);

        return $stmt->fetch();
    }
    
    public function getProperties() {
        $sql = "SELECT size, color, price, quantity, id_product FROM {$this->table}";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_ASSOC);

        return $stmt->fetchAll();
    }

    public function getPropertiesByProductId($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id_product = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_ASSOC);

        return $stmt->fetchAll();
    }

    public function getProductProperties($id) {
        $sql = "SELECT categories_properties.id as idProperties, size, color, price, quantity FROM categories_properties
        LEFT JOIN products ON categories_properties.id_product = products.id WHERE categories_properties.id_product = :id";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':id', $id);

        $stmt->execute();

        $stmt->setFetchMode(\PDO::FETCH_ASSOC);

        return $stmt->fetchAll();
    }

    public function getId($color, $size, $id_product) {
        $sql = "SELECT id FROM categories_properties WHERE color = :color AND size = :size AND id_product = :id_product";
    
        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(':color', $color);
        $stmt->bindParam(':size', $size);
        $stmt->bindParam(':id_product', $id_product);
    
        $stmt->execute();
    
        return $stmt->fetch(\PDO::FETCH_ASSOC)['id'];
    }
    
    public function getCategories(){
        $sql = "SELECT * FROM categories_properties";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }
    
}
?>