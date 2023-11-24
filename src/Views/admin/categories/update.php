<div class="container col-8">
    <h2>Cập nhật danh mục</h2>

    <form action="" method="post">
        <label for="name">Tên danh mục</label>
        <input type="text" name="name" class="form-control" value="<?= $categoryCurrent['name_category'] ?>">

        <button type="submit" name="btn-submit" class="btn btn-info mt-3">Thay đổi</button>
        <a href="/admin/categories" class="btn btn-primary mt-3">Quay lại d/s</a>
    </form>
</div>