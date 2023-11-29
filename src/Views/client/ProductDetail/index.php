
<style>
    .preview-thumbnail li a img {
        height: 180px;
        object-fit: cover;
    }

    .preview-pic .tab-pane.active img {
        height: 600px;
        object-fit: cover;

    }
</style>


<main id="main">
    <div class="container mt-5">
        <h5><a href="/">TRANG CHỦ / </a><a href="Category?id=<?= $productCurrent['id_category'] ?>" class="text-uppercase"><?= $productCurrent['name_category'] ?></a></h5>
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">

                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1"><img src="assets/files/assets/images/<?= $productCurrent['image_urls'][0] ?>" alt="Ảnh sản phẩm"></div>
                        </div>
                        <ul class="preview-thumbnail nav nav-tabs">
                            <?php foreach ($productCurrent['image_urls'] as $image) : ?>
                            <li><a><img src="assets/files/assets/images/<?= $image ?>" /></a></li>
                            <?php endforeach; ?>
                        </ul>

                    </div>
                    <div class="details col-md-6">
                        <h3 class="product-title"><?php echo $productCurrent['name_product'] ?></h3>
                        <div class="rating">
                            <div class="stars">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                            </div>
                            <span class="review-no">41 đánh giá</span>
                        </div>
                        <p class="product-description"><?php echo empty($productCurrent['description']) ? 'Chưa có mô tả' :  $productCurrent['description'] ?></p>
                        <h4 class="price">Giá hiện tại: <span><?php echo number_format($productCurrent['price'], 0, '.', ',') ?>₫</span></h4>
                        <p class="vote"><strong>Danh mục: </strong><a href="Categories?id=<?= $productCurrent['id_category'] ?>"> <?= $productCurrent['name_category'] ?></a></strong></p>
                        <h5 class="sizes">

                        </h5>
                        <h5 class="colors">

                        </h5>
                        <div class="action">
                            <form method="post">
                                <input class="add-to-cart btn btn-default" type="submit" value="Thêm vào giỏ hàng" name="btnSave" style="background-color: #00d2d4;">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="commentUsers container">
        <h3 class=" fw-bolder mt-3">Nhận xét sản phẩm từ khách hàng</h3>
        <?php
        // commentPage($id, $users);
        ?>
    </div>
</main>