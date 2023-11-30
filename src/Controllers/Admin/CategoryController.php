<?php 

namespace MVC_DA1\Controllers\Admin;

use MVC_DA1\Controller;
use MVC_DA1\Models\Category;

class CategoryController extends Controller {


    public function index() {
        $categories = (new Category())->all();
        $this->renderAdmin("categories/index", ["categories" => $categories]);
    }

    /* Thêm mới */
    public function create() {
        if (isset($_POST["btn-submit"])) { 
            $data = [
                'name_category' => $_POST['name'],
            ];

            (new Category())->insert($data);

            header('Location: /admin/categories');
        }

        $this->renderAdmin("categories/create");
    }

    /* Cập nhật */
    public function update() {

        $id = $_GET['id'];
        $categoryCurrent = (new Category())->findOne($id);
 
        if (isset($_POST["btn-submit"])) { 
            $data = [
                'name_category' => $_POST['name'],
            ];

            $conditions = [
                ['id', '=', $_GET['id']],
            ];

            (new Category())->update($data, $conditions);

            header('Location: /admin/categories');
        }

        $this->renderAdmin("categories/update", [
            "categoryCurrent" => $categoryCurrent]
        );
    }

    /* Xóa */
    public function delete() {
        $conditions = [
            ['id', '=', $_GET['id']],
        ];

        (new Category())->delete($conditions);

        header('Location: /admin/categories');
    }
}