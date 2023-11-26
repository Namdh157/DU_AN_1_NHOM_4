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
}