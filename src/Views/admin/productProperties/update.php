<div class="container col-8">
    <h2>Cập nhật thuộc tính sản phẩm</h2>

    <form action="" method="post">
        <label for="color">Màu săc</label>
        <input type="text" name="color" class="form-control" value="<?= $categories_PropertiesUpdate['color'] ?>">

        <label for="size">Kích cỡ</label>
        <input type="text" name="size" class="form-control" value="<?= $categories_PropertiesUpdate['size'] ?>">

        <label for="price">Giá tiền</label>
        <input type="text" name="price" class="form-control" value="<?= $categories_PropertiesUpdate['price'] ?>">

        <button type="submit" name="btn-submit" class="btn btn-info mt-3">Thay đổi</button>
        <a href="/admin/categories" class="btn btn-primary mt-3">Quay lại d/s</a>
    </form>
</div>