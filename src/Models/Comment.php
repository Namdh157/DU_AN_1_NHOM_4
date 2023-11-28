<?php

namespace MVC_DA1\Models;

use MVC_DA1\Model;

class Comment extends Model
{
    protected $columns=[];
    protected $table = 'comment';
    protected $column = [
        'id',
        'content',
        'id_user',
        'id_pro',
        'date_comment',
    ];
    public function __construct()
    {
        parent::__construct();
        $this->table = 'comment';
        $this->columns = ['content', 'id_user', 'id_pro', 'date_comment'];
    }
    public function updateComment($id, $newContent)
    {
        $sql = "UPDATE comment SET content = :content WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':content', $newContent);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount(); 
    }
    
}