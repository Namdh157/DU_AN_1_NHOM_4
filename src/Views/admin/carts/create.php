<div class="container col-7 pt-3">
    <h1>Thêm mới đơn hàng</h1>

    <form action="" method="post">
        <label for="id_product">Tên sản phẩm</label>
        <div class="col-sm-12 col-xl-3 m-b-30">
            <select name="id_product" class="form-control form-control-default">
                <option value="">Chọn sản phẩm</option>
                <?php foreach ($allProduct as $value) : ?>
                    <option value="<?= $value['id'] ?>">
                        <?= $value['name_product'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>


        <label for="quantity" class="mt-3">Số lượng</label>
        <input type="number" name="quantity" class="form-control" value="<?= $cartCurrent['quantity'] ?>">

        <label for="id_user" class="mt-3">Khách hàng</label>
        <div class="col-sm-12 col-xl-3 m-b-30">
            <select name="id_user" class="form-control form-control-default">
                <option value="">Chọn khách hàng</option>
                <?php foreach ($allUser as $value) : ?>
                    <option value="<?= $value['id'] ?>">
                        <?= $value['name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <label for="time" class="mt-3">Thời gian</label>
        <input type="text" name="time" class="form-control" value="">

        <button type="submit" name="btn-submit" class="btn btn-info mt-3">Submit</button>
        <a href="/admin/carts" class="btn btn-primary mt-3">Quay lại d/s</a>
    </form>
</div>