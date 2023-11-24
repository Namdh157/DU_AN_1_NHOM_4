<?php

namespace MVC_DA1\Models;

use MVC_DA1\Model;

class User extends Model {
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
}