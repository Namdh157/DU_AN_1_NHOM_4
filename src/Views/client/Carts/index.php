<style>

    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    #quantity {
        width: 30px;
        text-align: center;
        border-left: 1px solid #dee2e6;
        border-right: 1px solid #dee2e6;
        border-top: none;
        border-bottom: none;
        outline: none;
    }
</style>
<?php
// giỏ hàng người dùng chưa đăng nhập
if (!isset($_SESSION['account'])) { ?>
    <div class="container">
        <?php if (empty($_SESSION['cart'])) : ?>
            <h3 class="text-center p-5">Bạn chưa có sản phẩm nào</h3>
            <div class="text-center">
                <h3 class="text-info ">
                    <a href="/">Mua ngay nào <i class="fa-solid fa-right-long"></i> </a>
                </h3>
            </div>
        <?php else : ?>
            <section class="h-custom">
                <div class="container">
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col">

                            <div class="card p-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-8">
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

                                            <?php foreach ($allProductsInCart as $key => $value) { ?>
                                                <div class="card p-0" id="idOrder-<?= $key ?>">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="idOrder" data-id="<?= $key ?>"></div>
                                                            <div class="d-flex flex-row align-items-center col-5">
                                                                <div class="col-3">
                                                                    <img src="/assets/files/assets/images/<?= $value['product']['image_url'] ?>" class="img-fluid rounded-3" alt="Shopping item" style="width: 85px;">
                                                                </div>
                                                                <div class=" col-9">
                                                                    <h5><?= $value['product']['name_product'] ?></h5>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex flex-row align-items-center col-7 p-0">
                                                                <div class="col-3 p-0">
                                                                    <div class="fw-normal d-flex border">
                                                                        <div class="btn minus"> <i class="fa-solid fa-minus"></i></div>
                                                                        <input id="quantity" type="number" data-order="<?= $key ?>" value="<?= $value['quantity'] ?>" onkeyup="totalPrice(this)">
                                                                        <div class="btn plus"> <i class="fa-solid fa-plus"></i></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-7">
                                                                    <p class="m-0">Màu sắc: <?= $value['product']['color'] ?></p>
                                                                    <p class="m-0">Kích cỡ: <?= $value['product']['size']  ?> </p>
                                                                    <p class="m-0">Giá tiền: <?= number_format($value['product']['unit_price'], 0, '.', ',') ?> ₫</p>
                                                                    <p class="m-0 total">Tổng tiền: <?= number_format($value['totalPrice'], 0, '.', ',') ?> ₫</p>
                                                                </div>
                                                                <div onclick="showConfirmationModal(<?= $key ?>)" class="col-2">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>


                                        </div>
                                        <div class="col-lg-4">

                                            <div class="card text-white rounded-3" style="background-color: #00d2d4;">
                                                <div class="card-body">
                                                    <h2 class="text-dark">Hóa đơn hiện tại</h2>
                                                    <hr class="my-4">

                                                    <div class="d-flex justify-content-between">
                                                        <p class="mb-2">Tổng tiền hàng</p>
                                                        <p class="mb-2 totalCart"> <?= number_format($totalCart, 0, '.', ',') ?> ₫</p>

                                                    </div>

                                                    <div class="d-flex justify-content-between">
                                                        <p class="mb-2">Phí giao hàng</p>
                                                        <p class="mb-2">0 ₫</p>
                                                    </div>

                                                    <div class="d-flex justify-content-between mb-4">
                                                        <p class="mb-2">Tổng tiền thanh toán </p>
                                                        <p class="mb-2 totalCart2"><?= number_format($totalCart, 0, '.', ',') ?> ₫</p>
                                                    </div>

                                                    <div class="method-pay mb-5">
                                                        <select name="payMethod" id="payMethod" class="form-select" style="background-color:#ff9f1a">
                                                            <option value="0">Thanh toán khi nhận hàng</option>
                                                            <option value="1">Thanh toán qua thẻ</option>
                                                        </select>
                                                    </div>

                                                    <button type="button" class="btn btn-block btn-lg" data-toggle="modal" data-target="#exampleModal" style="background-color:#ff9f1a">
                                                        <div class="d-flex justify-content-between">
                                                            <span>Đặt hàng <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
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
<?php }

//giỏ hàng người dùng đã đăng nhập
else { ?>
    <div class="container">
        <?php if ($countCart == 0) : ?>
            <h3 class="text-center p-5">Bạn chưa có sản phẩm nào</h3>
            <div class="text-center">
                <h3 class="text-info ">
                    <a href="/">Mua ngay nào <i class="fa-solid fa-right-long"></i> </a>
                </h3>
            </div>
        <?php else : ?>
            <section class="h-custom">
                <div class="container">
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col">
                            <div class="card p-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-8">
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
                                            <?php foreach ($allProductsInCart as $key => $value) { ?>
                                                <div class="card p-0" id="idOrder-<?= $value['order_id'] ?>">
                                                    <div class="card-body">
                                                        <div class="idOrder" data-id="<?= $key ?>"></div>
                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex flex-row align-items-center col-5">
                                                                <div class="col-3">
                                                                    <img src="/assets/files/assets/images/<?= $value['image_url'] ?>" class="img-fluid rounded-3" alt="Shopping item" style="width: 85px;">
                                                                </div>
                                                                <div class=" col-9">
                                                                    <h5><?= $value['product_name'] ?></h5>
                                                                </div>
                                                            </div>

                                                            <div class="d-flex flex-row align-items-center col-7 p-0">
                                                                <div class="col-3 p-0">
                                                                    <div class="fw-normal d-flex border">
                                                                        <div class="btn minus"> <i class="fa-solid fa-minus"></i></div>
                                                                        <input id="quantity" type="number" data-order="<?= $value['order_id'] ?>" value="<?= $value['quantity'] ?>" onkeyup="totalPrice(this)">
                                                                        <div class="btn plus"> <i class="fa-solid fa-plus"></i></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-7">
                                                                    <p class="m-0">Màu sắc: <?= $value['color'] ?></p>
                                                                    <p class="m-0">Kích cỡ: <?= $value['size']  ?> </p>
                                                                    <p class="m-0">Giá tiền: <?= number_format($value['unit_price'], 0, '.', ',') ?> ₫</p>

                                                                    <p class="m-0 total">Tổng tiền: <?= number_format($value['total_price'], 0, '.', ',') ?> ₫</p>
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

                                        <div class="col-lg-4">

                                            <div class="card text-white rounded-3" style="background-color: #00d2d4;">
                                                <div class="card-body">
                                                    <h2 class="text-dark">Hóa đơn hiện tại</h2>
                                                    <hr class="my-4">

                                                    <div class="d-flex justify-content-between">
                                                        <p class="mb-2">Tổng tiền hàng</p>

                                                        <p class="mb-2 totalCart"> <?= number_format($totalCart, 0, '.', ',') ?> ₫</p>

                                                    </div>

                                                    <div class="d-flex justify-content-between">
                                                        <p class="mb-2">Phí giao hàng</p>
                                                        <p class="mb-2">0 ₫</p>
                                                    </div>

                                                    <div class="d-flex justify-content-between mb-4">

                                                        <p class="mb-2">Tổng tiền thanh toán </p>
                                                        <p class="mb-2 totalCart2"><?= number_format($totalCart, 0, '.', ',') ?> ₫</p>
                                                    </div>

                                                    <div class="method-pay mb-5">
                                                        <select name="" id="payMethod" class="form-select" style="background-color:#ff9f1a">
                                                            <option value="0">Thanh toán khi nhận hàng</option>
                                                            <option value="1">Thanh toán qua thẻ</option>
                                                        </select>
                                                    </div>

                                                    <button type="button" class="btn btn-block btn-lg" data-toggle="modal" data-target="#exampleModal"  style="background-color:#ff9f1a">
                                                        <div class="d-flex justify-content-between">
                                                            <span>Đặt hàng <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
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


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thông tin chi tiết</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="nameUser" class="col-form-label">Họ và tên</label>
                    <input type="text" class="form-control" id="nameUser" value="<?= empty($_SESSION['account']['name']) ? '' : $_SESSION['account']['name'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="address" class="col-form-label">Địa chỉ</label>
                    <input type="text" class="form-control" id="address" value="<?= empty($_SESSION['account']['address']) ? '' : $_SESSION['account']['address'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="phone" class="col-form-label">Số điện thoại</label>
                    <input type="number" class="form-control" id="phone" value="<?= empty($_SESSION['account']['phone']) ? '' : $_SESSION['account']['phone'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="note" class="col-form-label">Ghi chú</label>
                    <textarea type="text" class="form-control" id="note"></textarea>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="pay">Xác nhận</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>
    const minus = document.querySelectorAll(".minus");
    const plus = document.querySelectorAll(".plus");
    const pay = document.querySelector('#pay');
    const modal = document.querySelector('.modal');
    const elements = document.querySelectorAll(".idOrder")
    var orderIdArray = [];


    minus.forEach(function(minus) {
        minus.addEventListener('click', () => {
            const input = minus.nextElementSibling;
            if (input.value > 1) {
                input.value--;
                totalPrice(input);
            }
        })
    });

    plus.forEach(function(plus) {
        plus.addEventListener('click', () => {
            const input = plus.previousElementSibling;
            input.value++;
            totalPrice(input);
        })
    });




    $("#pay").on('click', function() {
        doneOrder();
    })

    function doneOrder() {
        var nameUser = $("#nameUser").val();
        var address = $("#address").val();
        var phone = $("#phone").val();
        var paymentMethod = $("#payMethod").val();
        var note = $("#note").val();
        elements.forEach(function(element) {
            var orderId = element.getAttribute("data-id");
            orderIdArray.push(orderId);
        });



        $.ajax({
            url: "/api/orders",
            type: "POST",
            data: {
                orderIds: orderIdArray,
                nameUser: nameUser,
                phone: phone,
                address: address,
                pay_method: paymentMethod,
                note: note,
                pay: ''
            },
            success: function(data) {
                data = JSON.parse(data);
                alert("Đặt hàng thành công");
                window.location.href = "/";
            }
        })

        $("#exampleModal").modal('hide');
    }

    function showConfirmationModal(orderId) {
        confirm("Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?");
        const xhr = new XMLHttpRequest();
        const formData = new FormData();
        formData.append('delete', '');
        formData.append('orderId', orderId);
        xhr.open('POST', '/api/orders');
        xhr.send(formData);
        xhr.onload = () => {
            if (xhr.status == 200) {

                const data = JSON.parse(xhr.responseText);
                document.querySelector(`#idOrder-${orderId}`).remove();
                document.querySelector(`.totalCart`).innerHTML = `${data.totalCart} ₫`;
                document.querySelector(`.totalCart2`).innerHTML = `${data.totalCart} ₫`;

            }
        }
    }

    function totalPrice(button) {
        const userId = <?= ($_SESSION['account']['id_user'] ?? 0) ?>;
        const orderId = button.getAttribute("data-order");
        const xhr = new XMLHttpRequest();
        const formData = new FormData();
        formData.append('totalPrice', '');
        formData.append('orderId', orderId);
        formData.append('userId', userId);
        if (button.value < 1) {
            button.value = 1;
        }
        formData.append('quantity', button.value);
        xhr.open('POST', '/api/orders');
        xhr.send(formData);
        xhr.onload = () => {
            if (xhr.status == 200) {
                const data = JSON.parse(xhr.responseText);
                console.log(data);
                document.querySelector(`#idOrder-${data.orderId} .total`).innerHTML = `Tổng tiền: ${data.totalPrice} ₫`;
                document.querySelector(`.totalCart`).innerHTML = `${data.totalCart} ₫`;
                document.querySelector(`.totalCart2`).innerHTML = `${data.totalCart} ₫`;
            }
        }
    }

</script>