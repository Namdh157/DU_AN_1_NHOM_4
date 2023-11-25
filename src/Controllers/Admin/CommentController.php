<?php

namespace MVC_DA1\Controllers\Admin;

use MVC_DA1\Controller;
use MVC_DA1\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $commentModel = new Comment;

        $addColumn = [
            ['comment.id', 'commentid'],
            
        ];
        $connect = [
            ['comment', 'users', 'comment.id_user', 'users.id'],
            ['products', 'comment', 'comment.id_pro', 'products.id'],
            
        ];

        $commentCurrent = $commentModel->joinTable($addColumn, $connect);

        $this->renderAdmin('comments/index', ['comments' => $commentCurrent]);
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $commentId = $_POST['commentid'] ?? null;
            $conditions = [
                ['id', '=', $commentId],
            ];

            $commentModel = new Comment;
            $commentModel->delete($conditions);

            header("Location: /admin/comments");
            exit;
        } else {
            echo "ID không tồn tại";
        }
    }
    public function update()
{
    if (isset($_POST['btn-submit'])) {
        $data = [
            'id' => $_POST['id'],
            'content' => $_POST['content'],
            'id_user' => $_POST['id_user'],
            'id_pro' => $_POST['id_pro'],
            'date_comment' => $_POST['date_comment'],
        ];

        $conditions = [
            ['id', '=', $_GET['id']],
        ];

        (new Comment)->update($data, $conditions);
    }

    $comment = (new Comment)->findOne($_GET['id']);

    echo '<pre>';
    print_r($comment);
    die;

    $this->renderAdmin('comments/update', ['comment' => $comment]);
}


}