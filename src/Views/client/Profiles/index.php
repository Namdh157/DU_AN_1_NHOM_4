<style>
    * {
        /* box-shadow: 0 0 2px #000; */
    }
</style>
<pre>
<?php
print_r($_SESSION);
?>
</pre>
<section class="" style="background-color: #f4f5f7;">
    <div class="container py-3">
        <h2 class="text-center py-3">Hồ sơ tài khoản</h2>
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
                    <i class="far fa-edit mb-5 "></i> sửa hồ sơ
                </div>
                <div class="col-12 gradient-custom text-start text-dark">
                    <ul class="m-0 p-0">
                        <a href="">
                            <li class="p-2 mb-2 border"> <i class="text-success fa-solid fa-user"></i> Tài khoản của tôi</li>
                        </a>
                        <a href="">
                            <li class="p-2 border"> <i class="text-success fa-solid fa-cart-shopping"></i> Đơn mua</li>
                        </a>
                    </ul>
                </div>
            </div>
            <div class="col-9 border ms-4" style="border-radius: .5rem;">
                <div class="card m-0" style="background-color: #f4f5f7; border:none;">
                    <h4>Hồ sơ của tôi</h4>
                    <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
                    <hr>
                    <div class="row">
                        <div class="col-7 d-flex flex-column align-items-end me-5 pe-5">
                            <div class="form-group">
                                <label for="">Tên tài khoản</label>
                                <input type="text" class="form-group">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-group">
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ</label>
                                <input type="text" class="form-group">
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="number" class="form-group">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-lg" style="background-color: #00d2d4; border:none;">Lưu</button>
                            </div>
                        </div>
                        <div class="col-4 d-flex flex-column align-items-center">
                            <img src="/assets/files/assets/images/<?= $_SESSION['account']['image_user'] ?>" class="rounded-circle mt-5" width="100" alt="">
                            <div class="border my-2" style="width:max-content">
                                <button class="btn">Chọn ảnh</button>
                                <input type="file" id="image" hidden>
                            </div>
                            <p>Dụng lượng file tối đa 1 MB</p>
                            <p>Định dạng:.JPEG, .PNG</p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>