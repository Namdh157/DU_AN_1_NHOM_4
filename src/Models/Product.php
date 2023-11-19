<?php

namespace MVC_DA1\Models;

use MVC_DA1\Model;

class Product extends Model {
    protected $table = 'products';
    protected $columns = [
        'id',
        'name',
        'name_product',
        'price',
        'img',
        'description',
        'view',
        'id_category',
        'discount',
        'special'
    ];
}