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
            'content' => $_POST['content'],
        ];

        $conditions = [
            ['id', '=', $_GET['id']],
        ];

        (new Comment)->update($data, $conditions);
    }

    $comment = (new Comment)->updateComment($_GET['id']);


    $this->renderAdmin('comments/update', ['comment' => $comment]);
}


}