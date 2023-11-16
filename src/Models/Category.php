<?php

namespace MVC_DA1\Models;

use MVC_DA1\Model;

class Category extends Model {
    protected $table = 'category';
    protected $columns = [
        'name',
    ];
}