<section class="" style="background-color: #f4f5f7;">
    <div class="container py-3">
        <h2 class="text-center py-3">Đơn hàng của tôi</h2>
        <div class="d-flex">
            <div class="col-3 g-0 border p-2" style="border-radius: .5rem;">
                <div class="col-12 gradient-custom text-center text-dark" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                    <img src="/assets/files/assets/images/<?= $_SESSION['account']['image_user'] ?>" alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                    <h5> <?= $_SESSION['account']['name'] ?></h5>
                    <p>
                        <?php if ($_SESSION['account']['role'] == 10) { ?>
                            <span class="badge bg-danger">Quản trị</span> <?php } elseif ($_SESSION['account']['role'] == 0) { ?>
                            <span class="badge bg-success">Khách hàng</span> <?php } ?>
                    </p>
                    <a href="/Profile"> <i class="far fa-edit mb-5 "></i> sửa hồ sơ</a>
                </div>
                <div class="col-12 gradient-custom text-start text-dark">
                    <ul class="m-0 p-0">
                        <a href="/Profile">
                            <li class="p-2 mb-2 border"> <i class="text-success fa-solid fa-user"></i> Tài khoản của tôi</li>
                        </a>
                        <a href="/Order">
                            <li class="p-2 border"> <i class="text-success fa-solid fa-cart-shopping"></i> Đơn mua</li>
                        </a>
                    </ul>
                </div>
            </div>
            <div class="col-9 border ms-4" style="border-radius: .5rem;">
                <div class="card m-0" style="background-color: #f4f5f7; border:none;">
                    <?php if (empty($allProductInBills)) { ?>
                        <h3 class="text-center p-5">Bạn chưa có sản phẩm nào</h3>
                        <div class="text-center">
                            <h3 class="text-info ">
                                <a href="/">Mua ngay nào <i class="fa-solid fa-right-long"></i> </a>
                            </h3>
                        </div>

                    <?php } else { ?>
                        <h4>Danh sách đơn hàng</h4>

                        <div class="card-block">
                            <div class="dt-responsive table-responsive">
                                <table class="table  table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Trạng thái</th>
                                            <th>Tổng tiền</th>
                                            <th>Thời gian đặt hàng</th>
                                            <th>Chi tiết</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($allProductInBills as $key => $cart) : ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
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
                                                    <button class="btn border bills" data-idBill="<?= $cart['id'] ?>" data-toggle="modal" data-target=".bd-example-modal-lg">
                                                        <i class="fa-solid fa-circle-info"></i>
                                                    </button>
                                                </td>
                                                <td>
                                                    <form action="/admin/carts/delete?id=<?= $cart['id'] ?>" method="post">
                                                        <button type="submit" onclick="return confirm('Bạn có chắc chắn hủy?');">
                                                            <?php if ($cart['status'] == 0) { ?>
                                                                <a href="/admin/carts/delete?id=<?= $cart['id'] ?>" class="btn btn-danger btn-sm mt-2">Hủy</a>
                                                            <?php } else if ($cart['status'] == 1) { ?>
                                                                <a href="/admin/carts/delete?id=<?= $cart['id'] ?>" class="btn btn-danger btn-sm mt-2">Hủy</a>
                                                            <?php } else if ($cart['status'] == 2) { ?>
                                                                <a href="/admin/carts/delete?id=<?= $cart['id'] ?>" class="btn btn-success btn-sm mt-2">Xác nhận</a>
                                                            <?php } else if ($cart['status'] == 3) { ?>
                                                                <a href="//admin/carts/delete?id=<?= $cart['id'] ?>" class="btn btn-danger btn-sm mt-2">Xác nhận</a>
                                                            <?php }


                                                            ?>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chi tiết đơn hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

<script>
    //viết bằng js thuần
    const bills = document.querySelectorAll('.bills');
    bills.forEach(bill => {
        bill.addEventListener('click', function() {
            const idBill = this.getAttribute('data-idBill');
            const xhr = new XMLHttpRequest();
            const formData = new FormData();
            formData.append('idBill', idBill);
            formData.append('render', '');
            xhr.open('POST', '/api/billDetail');
            xhr.send(formData);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    const result = JSON.parse(xhr.responseText);
                    console.log(result);
                    const modalBody = document.querySelector('.modal-body');
                    modalBody.innerHTML = '';
                    result.forEach(item => {
                        modalBody.innerHTML += `
                        <div class="row">
                            <div class="col-2">
                                <img src="/assets/files/assets/images/${item.image_url}" alt="" width="100">
                            </div>
                            <div class="col-10 d-flex">
                                <div class="col-6">
                                    <p class="text-dark">${item.name_product}</p>
                                    <p class="text-dark">Số lượng: ${item.quantity}</p>
                                    <p class="text-dark">Giá: ${item.price}</p>
                                </div>
                                <div class="col-6">
                                    <p class="text-dark">Màu: ${item.color}</p>
                                    <p class="text-dark">Size: ${item.size}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        `
                    })

                } else {
                    alert('Có lỗi xảy ra');
                }
            }


        })
    })
</script>