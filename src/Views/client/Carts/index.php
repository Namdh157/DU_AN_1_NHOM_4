<style>
    * {
        /* box-shadow: 0 0 2px #000; */
    }
</style>
<?php
if (empty($_SESSION['account'])) { ?>
    <div class="container text-center my-5">
        <h3>Bạn chưa đăng nhập</h3>
        <p>Vui lòng đăng nhập để có giỏ hàng và tiếp tục mua sắm ở shop </p>
    </div>
<?php } else { ?>
    <div class="container">
        <?php if ($countCart == 0) : ?>
            <h3 class="text-center p-5">Bạn chưa có sản phẩm nào</h3>
            <div class="text-center p-5">
                <p>Vui lòng quay lại để thêm hàng vào giỏ hàng</p>
                <a href="/">Trang chủ</a>
            </div>
        <?php else : ?>
            <section class="h-custom">
                <div class="container">
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <h5 class="mb-3"><a href="/" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Tiếp tục mua sắm</a></h5>
                                            <hr>

                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                <div>
                                                    <p class="mb-1">Giỏ hàng</p>

                                                </div>
                                                <div>
                                                    <p class="mb-0"><span class="text-muted">Sắp xếp theo:</span> <a href="#!" class="text-body">Giá <i class="fas fa-angle-down mt-1"></i></a></p>
                                                </div>
                                            </div>
                                            <?php foreach ($allProductsInCart as $value) { ?>
                                                <div class="card p-0 m-2">
                                                    <div class="card-body">
                                                        <div class="idOrder" data-id="<?= $value['order_id'] ?>"></div>
                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex flex-row align-items-center col-6">
                                                                <div class="col-3">
                                                                    <img src="/assets/files/assets/images/<?= $value['image_url'] ?>" class="img-fluid rounded-3" alt="Shopping item" style="width: 85px;">
                                                                </div>
                                                                <div class=" col-9">
                                                                    <h5><?= $value['product_name'] ?></h5>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex flex-row align-items-center col-6">
                                                                <div class="col-3">
                                                                    <h5 class="fw-normal mb-0"><?= $value['quantity'] ?></h5>
                                                                </div>
                                                                <div class="col-7">
                                                                    <p class="m-0">Màu sắc: <?= $value['color'] ?></p>
                                                                    <p class="m-0">Kích cỡ: <?= $value['size']  ?> </p>
                                                                    <p class="m-0">Giá tiền: <?= number_format($value['unit_price'], 0, '.', ',') ?> ₫</p>
                                                                    <p class="m-0">Tổng tiền: <?= number_format($value['total_price'], 0, '.', ',') ?> ₫</p>
                                                                </div>
                                                                <div onclick="showConfirmationModal(<?= $value['order_id'] ?>)" class="col-2">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>


                                        </div>
                                        <div class="col-lg-5">

                                            <div class="card text-white rounded-3" style="background-color: #00d2d4;">
                                                <div class="card-body">
                                                    <h2 class="text-dark">Hóa đơn hiện tại</h2>
                                                    <hr class="my-4">

                                                    <div class="d-flex justify-content-between">
                                                        <p class="mb-2">Tổng tiền hàng</p>
                                                        <p class="mb-2"> <?= number_format($totalCart, 0, '.', ',') ?> ₫</p>

                                                    </div>

                                                    <div class="d-flex justify-content-between">
                                                        <p class="mb-2">Phí giao hàng</p>
                                                        <p class="mb-2">0 ₫</p>
                                                    </div>

                                                    <div class="d-flex justify-content-between mb-4">
                                                        <p class="mb-2">Tổng tiền thanh toán <?= number_format($totalCart, 0, '.', ',') ?></p>
                                                        <p class="mb-2"><?= number_format($totalCart, 0, '.', ',') ?> ₫</p>
                                                    </div>

                                                    <button id="pay" type="button" class="btn btn-block btn-lg" style="background-color:#ff9f1a">
                                                        <div class="d-flex justify-content-between">
                                                            <span>Thanh toán <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                                        </div>
                                                    </button>

                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </div>
<?php } ?>

<script>
    const pay = document.querySelector('#pay');
    const elements = document.querySelectorAll(".idOrder")
    var orderIdArray = [];

    pay.addEventListener('click', () => {
        elements.forEach(function(element) {
            var orderId = element.getAttribute("data-id");
            orderIdArray.push(orderId);
        });
        const xhr = new XMLHttpRequest();
        const formData = new FormData();
        orderIdArray.forEach((orderId, index) => {
            formData.append(`orderIds[${index}]`, orderId);
        });
        formData.append('pay', '');
        xhr.open('POST', '/api/orders');
        xhr.send(formData);
        xhr.onload = () => {
            if (xhr.status == 200) {
                alert("Thanh toán thành công");
                window.location.href = '/';
            }
        }
    })
</script>