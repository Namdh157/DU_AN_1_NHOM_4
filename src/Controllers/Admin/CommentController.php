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
            ['products.img', 'products_img']
        ];
        $connect = [
            ['comment', 'users', 'comment.id_user', 'users.id'],
            ['products', 'comment', 'comment.id_pro', 'products.id']
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
        $commentModel = new Comment;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $commentId = $_GET['id'] ?? null;
            $newContent = $_POST['content'] ?? null;

            if (!$commentId || $newContent === null) {
                echo "Dữ liệu không hợp lệ";
                return;
            }

            $conditions = [
                ['id', '=', $commentId],
            ];
            $updateData = [
                'content' => $newContent,
            ];


            $commentModel->update($updateData, $conditions);
            header("Location: /admin/comments");
            exit;
        } else {
            $commentId = $_GET['id'] ?? null;
            if (!$commentId) {
                echo "ID không tồn tại";
                return;
            }

            $addColumn = [
                ['comment.id', 'commentid'],
                ['users.name', 'user_name'],
                ['users.image', 'image'],
            ];
            $connect = [
                ['comment', 'users', 'comment.id_user', 'users.id'],
                ['products', 'comment', 'comment.id_pro', 'products.id'],
            ];

            $commentCurrent = $commentModel->joinTable($addColumn, $connect);

            $commentUpdate = null;
            foreach ($commentCurrent as $comment) {
                if ($comment['commentid'] == $commentId) {
                    $commentUpdate = $comment;
                    break;
                }
            }

            $this->renderAdmin('comments/update', ['comment' => $commentUpdate]);
        }
    }
}