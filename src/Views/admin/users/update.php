<div class="container col-8">
    <h1>Cập nhật User</h1>

    <form action="" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="<?= $user['name'] ?>">

        <label for="address" class="mt-3">Email</label>
        <input type="email" name="email" class="form-control" value="<?= $user['email'] ?>">

        <label for="password" class="mt-3">Password</label>
        <input type="password" name="password" class="form-control" value="<?= $user['password'] ?>">

        <label for="address" class="mt-3">Address</label>
        <input type="text" name="address" class="form-control" value="<?= $user['address'] ?>">

        <button type="submit" name="btn-submit" class="btn btn-info mt-3">Submit</button>
        <a href="/admin/users" class="btn btn-primary mt-3">Quay lại d/s</a>
    </form>
</div>