<?php
if (empty($_SESSION['account'])) { ?>
    <div class="container text-center my-5">
        <h3>Bạn chưa đăng nhập</h3>
        <p>Vui lòng đăng nhập để có giỏ hàng và tiếp tục mua sắm ở shop </p>
    </div>
<?php } else { ?>
    <div class="container">
        <?php if (!empty($allProductInCart)) { ?>
            <h3>Bạn chưa có sản phẩm nào</h3>
        <?php  } else { ?>


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
                                                   
                                                </div>
                                                <div>
                                                    <p class="mb-0"><span class="text-muted">Sắp xếp theo:</span> <a href="#!" class="text-body">Giá <i class="fas fa-angle-down mt-1"></i></a></p>
                                                </div>
                                            </div>
                                            <?php foreach ($allProductsInCart as $value) { ?>
                                                <div class="card mb-3">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex flex-row align-items-center">
                                                                <div>
                                                                   <img src="/assets/files/assets/images/<?= $value['img'] ?>" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                                                                </div>
                                                                <div class="ms-3">
                                                                    <h5><?= $value['name_product'] ?></h5>
                                                                    <p class="small mb-0"><?= $value['description'] ? $value['description'] : 'Chưa có mô tả' ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex flex-row align-items-center">
                                                                <div style="width: 50px;">
                                                                    <h5 class="fw-normal mb-0"><?= $value['quantity'] ?></h5>
                                                                </div>
                                                                <div style="width: 80px;">
                                                                    <h5 class="mb-0"><?= number_format($value['price'], 0, '.', ',') ?> ₫</h5>
                                                                </div>
                                                                <a href="javascript:confirmDelete('client/Cart/delete?id=<?= $value['id'] ?>')" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
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
                                                        <img src="/assets/files/assets/images/<?= $_SESSION['account']['image_user'] ?>" class="img-fluid rounded-3" style="width: 45px;" alt="Avatar">
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
                                                       
                                                    </div>

                                                    <div class="d-flex justify-content-between">
                                                        <p class="mb-2">Phí giao hàng</p>
                                                        <p class="mb-2">0 ₫</p>
                                                    </div>

                                                    <div class="d-flex justify-content-between mb-4">
                                                        <p class="mb-2">Tổng tiền thanh toán</p>
                                                      
                                                    </div>

                                                    <button type="button" class="btn btn-block btn-lg" style="background-color:#ff9f1a">
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
        <?php } ?>
    </div>
<?php } ?>