<?php

namespace MVC_DA1\Controllers\Admin;

use MVC_DA1\Controller;
use MVC_DA1\Models\Bills;
use MVC_DA1\Models\Cart;
use MVC_DA1\Models\Comment;
use MVC_DA1\Models\User;


class UserController extends Controller
{
    protected $allUsers;

    public function __construct() {
        $this->allUsers = (new User)->all();
    }

    public function index() {
        
        $this->renderAdmin('users/index', [
            'users' =>  $this->allUsers
        ]);
    }

    public function create() {
        if (isset($_POST['btn-submit'])) { 
            $data = [
                'user_name' => $_POST['nameUser'],
                'password' => $_POST['password'],
                'name' => $_POST['name'],
                'image' => $_FILES['image']['name'],
                'email' => $_POST['email'],
                'address' => $_POST['address'],
                'phone' => $_POST['phone'],
                'role' => 0,
            ];
            if(!empty($data['image'])) {
                $fileUrl = '/assets/files/assets/images/';
                move_uploaded_file($fileUrl, $data['image']);
            }

            (new User)->insert($data);

            header('Location: /admin/users');
        }

        $this->renderAdmin('users/create');
    }

    public function update() {
        $user = (new User)->findOne($_GET['id']);

        if (isset($_POST['btn-submit'])) { 

            if(!empty($_FILES['image']['name'])) {
                $imageUrl = $_FILES['image']['name'];
                $url = 'assets/files/assets/images/';
                move_uploaded_file($_FILES['image']['tmp_name'], $url.$imageUrl);
            } else { 
                $imageUrl = $user['image'];
            }
            $data = [
                'user_name' => $_POST['nameUser'],
                'password' => $_POST['password'],
                'name' => $_POST['name'],
                'image' => $imageUrl,
                'email' => $_POST['email'],
                'address' => $_POST['address'],
                'phone' => $_POST['phone'],
                'role' => $_POST['role'],
            ];

            $conditions = [
                ['id', '=', $_GET['id']]
            ];

            (new User)->update($data, $conditions);
            
            header('Location: /admin/users');

        }


        $this->renderAdmin('users/update', [
            'user' => $user,
        ]);
    }

    public function delete() {
        $conditions = [
            ['id', '=', $_GET['id']]
        ];
        $conditions2 = [
            ['id_user', '=', $_GET['id']]
        ];

        (new Bills)->delete($conditions2);

        (new Cart)->delete($conditions2);

        (new Comment)->delete($conditions2);

        (new User)->delete($conditions);

        header('Location: /admin/users');
    }
}
