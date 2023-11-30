<div class="containerHome">
    <div class="home_banner">
        <img src="assets/image/Ảnh-bia-mixishop-1-1536x585.jpg" width="100%" alt="">
    </div>
    <h1 class="fs-3 fs-sm-1">BÁN CHẠY NHẤT
        <a href="#">
            <p>XEM TẤT CẢ</p>
        </a>
    </h1>
    <div class="container-listProducts">
        <?php
        listProducts($productSeller);
        ?>
    </div>
    <div class="container-banner my-5 rounded">
        <div class="overlay"></div>

        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
            <source src="assets/image/video-1598728053.mp4" type="video/mp4">
        </video>

        <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center">
                <div class="w-100 text-white">
                    <h3 class="display">SOURTDANG</h3>
                    <p class="lead">Cập nhât về thông tin sản phẩm mới</p>
                    <a target="_blank" href="https://www.facebook.com/profile.php?id=100011643516649" class="fanpage">FANPAGE</a>
                    <a target="_blank" href="https://www.messenger.com/t/100011386026746" class="instagram">INSTAGRAM</a>
                </div>
            </div>
        </div>
    </div>
    <h1 class="fs-3 fs-sm-1">Các sản phẩm đang giảm giá</h1>
    <div class="container-listProducts">
        <?php
        listProducts($productDiscount);
        ?>
    </div>
</div>