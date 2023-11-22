<?php
if (empty($users)) { ?>
    <div class="container text-center my-5">
        <h3>Bạn chưa đăng nhập</h3>
        <p>Vui lòng đăng nhập để có giỏ hàng và tiếp tục mua sắm ở shop </p>
    </div>
<?php } else { ?>
    <div class="container">
        <h2 class="text-center mt-5">Giỏ hàng của bạn</h2>
        <section class="h-custom">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col">
                        <div class="card">
                            <div class="card-body p-4">

                                <div class="row">

                                    <div class="col-lg-7">
                                        <h5 class="mb-3"><a href="index.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Tiếp tục mua sắm</a></h5>
                                        <hr>

                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <div>
                                                <p class="mb-1">Giỏ hàng</p>
                                                <p class="mb-0">Bạn có <?php echo countSumCart($userId)['count'] ?> sản phẩm trong giỏ hàng</p>
                                            </div>
                                            <div>
                                                <p class="mb-0"><span class="text-muted">Sắp xếp theo:</span> <a href="#!" class="text-body">Giá <i class="fas fa-angle-down mt-1"></i></a></p>
                                            </div>
                                        </div>
                                        <?php foreach (getAllCartsForUser($userId) as $value) { ?>
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between">
                                                        <div class="d-flex flex-row align-items-center">
                                                            <div>
                                                                <img src="assets/image/<?php echo $value['img'] ?>" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                                                            </div>
                                                            <div class="ms-3">
                                                                <h5><?php echo $value['name_product'] ?></h5>
                                                                <p class="small mb-0"><?php echo $value['description'] ? $value['description'] : 'Chưa có mô tả' ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-row align-items-center">
                                                            <div style="width: 50px;">
                                                                <h5 class="fw-normal mb-0"><?php echo $value['quantity'] ?></h5>
                                                            </div>
                                                            <div style="width: 80px;">
                                                                <h5 class="mb-0"><?php echo number_format($value['price'], 0, '.', ',') ?> ₫</h5>
                                                            </div>
                                                            <a href="javascript:confirmDelete('/PHP_basic/DU_AN_MAU/view/cart/delete.php?id=<?php echo $value['id_cart'] ?>')" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>


                                    </div>
                                    <div class="col-lg-5">

                                        <div class="card text-white rounded-3" style="background-color: #00d2d4;">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between align-items-center mb-4">
                                                    <h5 class="mb-0">Thẻ chính</h5>
                                                    <img src="/PHP_basic/DU_AN_MAU/assets/image/<?php echo $users['image'] ?>" class="img-fluid rounded-3" style="width: 45px;" alt="Avatar">
                                                </div>

                                                <p class="small mb-2">Loại thẻ</p>
                                                <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                                                <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-visa fa-2x me-2"></i></a>
                                                <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-amex fa-2x me-2"></i></a>
                                                <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-paypal fa-2x"></i></a>

                                                <form class="mt-4">
                                                    <div class="form-outline form-white mb-4">
                                                        <input type="text" id="typeName" class="form-control form-control-lg" siez="17" placeholder="Tên thẻ" />
                                                        <label class="form-label" for="typeName">Tên thẻ</label>
                                                    </div>

                                                    <div class="form-outline form-white mb-4">
                                                        <input type="text" id="typeText" class="form-control form-control-lg" siez="17" placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />
                                                        <label class="form-label" for="typeText">Số thẻ</label>
                                                    </div>

                                                    <div class="row mb-4">
                                                        <div class="col-md-6">
                                                            <div class="form-outline form-white">
                                                                <input type="text" id="typeExp" class="form-control form-control-lg" placeholder="MM/YYYY" size="7" id="exp" minlength="7" maxlength="7" />
                                                                <label class="form-label" for="typeExp">Hết hạn</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-outline form-white">
                                                                <input type="password" id="typeText" class="form-control form-control-lg" placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                                                                <label class="form-label" for="typeText">Cvv</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>

                                                <hr class="my-4">

                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-2">Tổng tiền hàng</p>
                                                    <p class="mb-2"><?php echo number_format(countSumCart($userId)['total'], 0, '.', ',') ?> ₫</p>
                                                </div>

                                                <div class="d-flex justify-content-between">
                                                    <p class="mb-2">Phí giao hàng</p>
                                                    <p class="mb-2">0 ₫</p>
                                                </div>

                                                <div class="d-flex justify-content-between mb-4">
                                                    <p class="mb-2">Tổng tiền thanh toán</p>
                                                    <p class="mb-2"><?php echo number_format(countSumCart($userId)['total'], 0, '.', ',') ?> ₫</p>
                                                </div>

                                                <button type="button" class="btn btn-block btn-lg" style="background-color:#ff9f1a">
                                                    <div class="d-flex justify-content-between">
                                                        <span><?php echo number_format(countSumCart($userId)['total'], 0, '.', ',') ?>₫ </span>
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
    </div>
<?php } ?>