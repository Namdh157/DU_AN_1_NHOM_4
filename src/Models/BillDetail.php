<?php

namespace MVC_DA1\Models;

use MVC_DA1\Model;

class BillDetail extends Model
{
    protected $table = 'bill_detail';
    protected $columns = [
        'id_bills',		
        'id_productProperties',
		'price',
        'quantity',
    ];

   
}