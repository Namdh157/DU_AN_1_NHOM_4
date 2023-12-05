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
                                                    <th>Sản phẩm</th>
                                                    <th>Số lượng</th>
                                                    <th>Trạng thái</th>
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
                                                        </td>
                                                        <td><?= $cart['quantity'] ?></td>
                                                        <td><?php
                                                            if($cart['status'] == 0){
                                                                echo "Đang chờ xử lý";
                                                            } else if($cart['status'] == 1){
                                                                echo "Đã thanh toán";
                                                            } else if($cart['status'] == 2){
                                                                echo "Đã giao hàng";
                                                            } else if($cart['status'] == 3){
                                                                echo "Đã hủy";
                                                            }
                                                        ?></td>
                                                        <td>
                                                            <span>Tên tài khoản: </span><?= $cart['user_name'] ?><br>
                                                            <span>Tên khách hàng: </span><?= $cart['name'] ?><br>
                                                            <span>Ảnh khách hàng: </span><img src="/assets/files/assets/images/<?= $cart['image'] ?>" alt="Ảnh khách hàng" width="100"><br>
                                                            <span>Email: </span><?= $cart['email'] ?><br>
                                                            <span>Địa chỉ:</span><?= $cart['address'] ?><br>
                                                            <span>Số điện thoại: </span><?= $cart['phone'] ?>
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