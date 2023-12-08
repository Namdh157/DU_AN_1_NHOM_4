<?php

namespace MVC_DA1\Models;

use MVC_DA1\Model;

class Bills extends Model
{
    protected $table = 'bills';
    protected $columns = [
        'id_user',	
	    'name_user',
		'price',
		'phone',
		'address',
		'status',
		'pay_method',
		'time_create',	
		'time_update',	
		'note'
    ];

   
}