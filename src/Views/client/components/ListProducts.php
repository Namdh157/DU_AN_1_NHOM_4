<?php
function listProducts($listProduct)
{ ?>
    <section style="background-color: #eee;">
        <div class="text-center container">
            <div class="row">
                <?php
                foreach ($listProduct as $value) { ?>
                    <div class="col-lg-4 col-sm-6 col-6 mb-4">
                        <a href="ProductDetail?id=<?=$value['product_id'] ?>">
                            <div class="card p-0 p-lg-3 m-0">
                                <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                                    <img src="/assets/files/assets/images//<?= $value['image_urls'][0] ?>" class="w-100" style="height: 450px;object-fit: cover; " />
                                    <a href="ProductDetail?id=<?=$value['product_id'] ?>">
                                        <div class="mask">
                                            <div class="d-flex justify  -content-start align-items-end h-100">
                                                <h5><span class="badge bg-primary ms-2"><?= $value['discount'] ?>%</span></h5>
                                            </div>
                                        </div>
                                        <div class="hover-overlay">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                        </div>
                                    </a>
                                </div>
                                <div class="card-body fs-1 p-0" style="height: 125px;">
                                    <a href="ProductDetail?id=<?=$value['product_id'] ?>" class="text-reset">
                                        <h5 class="card-title mb-3"><?= $value['name_product'] ?></h5>
                                    </a>
                                    <a href="Categories?id=<?= $value['id_category'] ?>" class="text-reset">
                                        <p><?= $value['name_category'] ?></p>
                                    </a>
                                    <h6 class="mb-3 fw-bold"><?= !empty($value['prices'][0]) ? number_format($value['prices'][0])."₫" : "Chưa cập nhật giá" ?></h6>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
    </section>
<?php  }
?>

<style>
    body{
        object-fit: cover;
    }





    
</style>