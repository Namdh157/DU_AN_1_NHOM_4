<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Giỏ hàng</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="/addmin/dashboard"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Giỏ hàng</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Danh sách Giỏ hàng</h5>

                                    <a href="/admin/carts/create" class="btn btn-info btn-sm">Tạo mới</a>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Sản phẩm</th>
                                                    <th>Số lượng</th>
                                                    <th>Khách hàng</th>
                                                    <th>Chức năng</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach ($showData as $key => $cart) : ?>
                                                    <tr>
                                                        <td><?= $key + 1 ?></td>
                                                        <td>
                                                        <span>Tên sản phẩm: </span><?= $cart['name_product'] ?><br>
                                                        <span>Tên danh mục: </span><?= $cart['name_category'] ?><br>
                                                        <span>Giá: </span><?= $cart['price'] ?><br>
                                                        <span>Ảnh sản phẩm: </span><img src="<?= $cart['img'] ?>" alt="Ảnh sản phẩm">
                                                        </td>
                                                        <td><?= $cart['quantity'] ?></td>
                                                        <td>
                                                            <span>Tên tài khoản: </span><?= $cart['user_name'] ?><br>
                                                            <span>Tên khách hàng: </span><?= $cart['name'] ?><br>
                                                            <span>Ảnh khách hàng: </span><img src="<?= $cart['img'] ?>" alt="Ảnh khách hàng"><br>
                                                            <span>Email: </span><?= $cart['email'] ?><br>
                                                            <span>Địa chỉ:</span><?= $cart['address'] ?><br>
                                                            <span>Số điện thoại: </span><?= $cart['phone'] ?>
                                                        </td>
                                                        <td>
                                                            <a href="/admin/carts/update?id=<?= $cart['cart_id'] ?>" class="btn btn-primary btn-sm">Cập nhật</a>

                                                            <form action="/admin/carts/delete?id=<?= $cart['cart_id'] ?>" method="post">
                                                                <button type="submit" onclick="return confirm('Bạn có chắc chắn xóa?');" class="btn btn-danger btn-sm mt-2">Xóa</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>