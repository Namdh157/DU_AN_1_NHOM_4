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
        $sql = "SELECT *  FROM products_images WHERE id_products = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([$id]);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function uploadImages($productId, $imageUrls) {
        $sql = "INSERT INTO products_images (id_products, image_url) VALUES (?, ?)";
    
        $stmt = $this->conn->prepare($sql);
      
        $stmt->execute([$productId, $imageUrls]);
    }

    public function deleteImage($idImage) {
        $sql = "DELETE FROM products_images WHERE id = ?";
    
        $stmt = $this->conn->prepare($sql);
      
        $stmt->execute([$idImage]);
    }


    
}

?>