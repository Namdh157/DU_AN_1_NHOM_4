<div class="container col-7 pt-3">
    <h1>Cập nhật đơn hàng</h1>

    <form action="" method="post">
        <label for="id_product">Tên sản phẩm</label>
        <div class="col-sm-12 col-xl-3 m-b-30">
            <select name="select" class="form-control form-control-default">
                <?php foreach ($allCart as $value) : ?>
                    <option value="<?= $value['id_product'] ?>" <?php echo ($value['id_product'] == $cart[0]['id_product']) ? "selected" : '' ?>>
                    <?= $value['name_product'] ?> 
                    </option>
                <?php endforeach; ?>
            </select>
        </div>


        <label for="quantity" class="mt-3">Số lượng</label>
        <input type="number" name="quantity" class="form-control" value="<?= $cart[0]['quantity'] ?>">

        <label for="id_user" class="mt-3">Khách hàng</label>
        <input type="text" name="id_user" class="form-control" value="<?= $cart[0]['id_user'] ?>">

        <label for="time" class="mt-3">Thời gian</label>
        <input type="text" name="time" class="form-control" value="<?= $cart[0]['time'] ?>">

        <button type="submit" name="btn-submit" class="btn btn-info mt-3">Submit</button>
        <a href="/admin/carts" class="btn btn-primary mt-3">Quay lại d/s</a>
    </form>
</div>
,cart.id, as cart_id