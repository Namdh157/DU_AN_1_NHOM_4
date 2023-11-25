<?php
function listProducts($listProduct)
{ ?>
    <section style="background-color: #eee;">
        <div class="text-center container py-5">
            <div class="row">
                <?php
                foreach ($listProduct as $value) { ?>
                    <div class="col-lg-4 col-sm-6 col-6 mb-4">
<<<<<<< HEAD
                        <a href="?type=ProductDetail&id=<?= $value['id'] ?>">
                            <div class="card p-0 p-lg-3">
                                <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                                    <?php if (!empty($value['image_urls'])) { ?>
                                        <img src="/assets/files/assets/images/<?= $value['image_urls'][0] ?>" class="w-100" />
                                    <?php } else { ?>
                                        <span>Sản phẩm chưa có ảnh nào cả</span>
                                    <?php } ?>
=======
                        <a href="ProductDetail?id=<?=$value['product_detail'] ?>">
                            <div class="card p-0 p-lg-3">
                                <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                                    <img src="/assets/files/assets/images//<?= $value['img'] ?>" class="w-100" />
>>>>>>> Dat
                                    <a href="#!">
                                        <div class="mask">
                                            <div class="d-flex justify-content-start align-items-end h-100">
                                                <h5><span class="badge bg-primary ms-2"><?= $value['discount'] ?>%</span></h5>
                                            </div>
                                        </div>
                                        <div class="hover-overlay">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                        </div>
                                    </a>
                                </div>
                                <div class="card-body fs-1 p-0" style="height: 125px;">
                                    <a href="" class="text-reset">
                                        <h5 class="card-title mb-3"><?= $value['name_product'] ?></h5>
                                    </a>
                                    <a href="Categories?id=<?= $value['id'] ?>" class="text-reset">
                                        <p><?= $value['name_category'] ?></p>
                                    </a>
                                    <h6 class="mb-3 fw-bold"><?= number_format($value['price'], 0, '.', ',')  ?>₫</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
    </section>
<?php  }
?>