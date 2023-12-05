<?php

namespace MVC_DA1\Models;

use MVC_DA1\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $columns = [
        'content',
        'id_user',
        'id_pro',
        'date_comment',
    ];
    public function allComment($id)
    {
        $sql = "SELECT * FROM comment JOIN users ON comment.id_user = users.id WHERE id_pro = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        return $result;
    }
}