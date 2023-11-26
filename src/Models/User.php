<?php

namespace MVC_DA1\Models;

use MVC_DA1\Model;

class User extends Model
{
    protected $table = 'users';
    protected $columns = [
        'user_name',
        'password',
        'name',
        'image',
        'email',
        'address',
        'phone',
        'role'
    ];

    public function login($data = []){
        
        $sql = "SELECT * FROM users WHERE user_name = ? AND password = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([$data['user_name'], $data['password']]);

        $stmt->setFetchMode(\PDO::FETCH_ASSOC);

        return $stmt->fetch();
    }
}