<div class="container col-7 pt-3">
    <h3>Cập nhật đơn hàng của <?= $cartCurrent['name_user']?></h3>

    <form action="" method="post">
        <label for="id_product">Khách hàng</label>
        <input type="text" name="nameUser" class="form-control" value="<?= $cartCurrent['name_user'] ?>" readonly>
        
        <label for="id_product">Giá</label>
        <input type="number" name="nameUser" class="form-control" value="<?= $cartCurrent['price'] ?>" readonly>

        <label for="id_product">Phương thức thanh toán</label>
        <input type="text" name="nameUser" class="form-control" value="Tiền mặt" readonly>

        <label for="id_product">Trạng thái</label>
        <select name="status" class="form-control">
            <option value="0" <?php if($cartCurrent['status'] == 0){ echo 'selected'; } ?>>Đang chờ xử lý</option>
            <option value="1" <?php if($cartCurrent['status'] == 1){ echo 'selected'; } ?>>Đang giao hàng</option>
            <option value="2" <?php if($cartCurrent['status'] == 2){ echo 'selected'; } ?>>Đã giao hàng</option>
            <option value="3" <?php if($cartCurrent['status'] == 3){ echo 'selected'; } ?>>Đã hủy</option>
        </select>


        <button type="submit" name="btn-submit" class="btn btn-info mt-3">Thay đổi</button>
        <a href="/admin/carts" class="btn btn-primary mt-3">Quay lại d/s</a>
    </form>
</div>

