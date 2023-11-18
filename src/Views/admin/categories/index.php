<div class="container col-8 pt-3">
    <h1>Category List</h1>

    <a href="/admin/categories/create" class="btn btn-info">Thêm</a>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>

        <?php foreach ($categories as $category) : ?>
            <tr>
                <td><?= $category['id'] ?></td>
                <td><?= $category['name_category'] ?></td>
                <td>
                    <a href="/admin/categories/update?id=<?= $category['id'] ?>" class="btn btn-primary btn-sm">Cập nhật</a>

                    <form action="/admin/categories/delete?id=<?= $category['id'] ?>" method="post">
                        <button type="submit" onclick="return confirm('Bạn có chắc chắn xóa?');" class="btn btn-danger btn-sm">Xóa</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
</div>