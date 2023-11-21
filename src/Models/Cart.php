<?php

namespace MVC_DA1\Models;

use MVC_DA1\Model;

class Cart extends Model {
    protected $table = 'cart';
    protected $columns = [
        'id_product',
        'quantity',
        'id_user',
        'time',
    ];

}