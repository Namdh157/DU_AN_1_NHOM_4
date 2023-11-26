<div class="container col-8">
    <h1>Cập nhật khách hàng</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="nameUser">Tên đăng nhập</label>
        <input type="text" name="nameUser" class="form-control" value="<?= $user['user_name'] ?>" required>

        <label for="password" class="mt-3">Mật khẩu</label>
        <input type="text" name="password" class="form-control" value="<?= $user['password'] ?>" required>

        <label for="name">Tên Khách hàng</label>
        <input type="text" name="name" class="form-control" value="<?= $user['name'] ?>" required>

        <label for="image">Hình ảnh</label>
        <input type="file" name="image" class="form-control">
        <img src="/assets/files/assets/images/<?= $user['image'] ?>" class="my-3" alt="Ảnh khách hàng" width="180"><br>

        <div class="col-12 m-b-30">
            <label for="name">Chức vụ</label>
            <select name="role" class="form-control form-control-primary">
                <option value="<?= $user['role'] ?>">
                    <?php
                    $roles = [0 => 'Khách hàng', 1 => 'Thành viên', 10 => 'Quản trị (admin)'];
                    echo $roles[$user['role']] ?? '';
                    ?>
                </option>
                <option value="0">Khách hàng</option>
                <option value="1">Thành viên</option>
                <option value="10">Quản trị (admin) </option>
            </select>
        </div>

        <label for="address" class="mt-3">Email</label>
        <input type="email" name="email" class="form-control" value="<?= $user['email'] ?>" required>

        <label for="address" class="mt-3">Địa chỉ</label>
        <input type="text" name="address" class="form-control" value="<?= $user['address'] ?>">

        <label for="phone" class="mt-3">Số điện thoại</label>
        <input type="text" name="phone" class="form-control" value="<?= $user['phone'] ?>">

        <button type="submit" name="btn-submit" class="btn btn-info mt-3">Submit</button>
        <a href="/admin/users" class="btn btn-primary mt-3">Quay lại d/s</a>
    </form>
</div>