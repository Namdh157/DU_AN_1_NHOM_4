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
                        <li class="breadcrumb-item"><a href="#!">Đơn hàng</a> </li>
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
                                    <h5>Danh sách đơn hàng</h5>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Thông tin khách hàng</th>
                                                    <th>Trạng thái</th>
                                                    <th>Tổng tiền</th>
                                                    <th>Thời gian đặt hàng</th>
                                                    <th>Ghi chú</th>
                                                    <th>Chức năng</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach ($showData as $key => $cart) : ?>
                                                    <tr>
                                                        <td><?= $key + 1 ?></td>
                                                        <td>
                                                            <?php if ($cart['id_user'] == 0) { ?>
                                                                <span class="text-info">*(Khách hàng chưa có tài khoản)</span><br>
                                                            <?php } ?>
                                                            <span>Tên khách hàng: </span><?= $cart['name_user'] ?><br>
                                                            <span>Địa chỉ:</span><?= $cart['address'] ?><br>
                                                            <span>Số điện thoại: </span><?= $cart['phone'] ?>
                                                        </td>
                                                        <td><?php
                                                            if ($cart['status'] == 0) { ?>
                                                                <span class="text-danger">Đang chờ xử lý</span>
                                                            <?php } else if ($cart['status'] == 1) { ?>
                                                                <span class="text-warning">Đang giao hàng</span>
                                                            <?php } else if ($cart['status'] == 2) { ?>
                                                                <span class="text-success">Đã giao hàng</span>
                                                            <?php } else if ($cart['status'] == 3) { ?>
                                                                <span class="text-danger">Đã hủy</span>
                                                            <?php }
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?= number_format($cart['price']) ?> VNĐ
                                                        </td>
                                                        <td>
                                                            <?= $cart['time_create'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $cart['note'] ?>
                                                        </td>
                                                        <td>
                                                            <a href="/admin/carts/update?id=<?= $cart['id'] ?>" class="btn btn-primary btn-sm">Cập nhật</a>

                                                            <form action="/admin/carts/delete?id=<?= $cart['id'] ?>" method="post">
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