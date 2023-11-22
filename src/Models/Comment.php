<?php

namespace MVC_DA1\Models;

use MVC_DA1\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $column = [
        'id',
        'content',
        'id_user',
        'id_pro',
        'date_comment',
    ];
}
