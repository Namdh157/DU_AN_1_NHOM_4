<?php


$categoryCurrent = getCategoryCurrent($id);
$listProduct = listProductsCategory($id);
$countProduct = countProducts($id);

?>
    <main id="main">
        <div class="container my-3">
            <div class="container-title d-flex justify-content-between align-self-center">
                <div class="title-left ">
                    <h3 class="fs-2 fw-bold"><?php echo $categoryCurrent[0]['name_category']  ?></h3>
                    <p class="fs-6 text-decoration-none"><a href="index.php" class="">TRANG CHỦ  /&ensp;</a> <span class="fw-bolder text-dark"> <?php echo $categoryCurrent[0]['name_category'] ?></span></p>
                </div>
                <p class="fs-6">Hiện thị <?php echo $countProduct[0]['count'] ?> kết quả</p>
                <div class="title right">
                    
                    <select class="form-select" name="" aria-label="Default select example">
                        <option value="">Mới nhất</option>
                        <option value="">Thứ tự theo mức phổ biến</option>
                        <option value="">Thứ tự theo mức đánh giá</option>
                        <option value="">Thứ tự theo giá: thấp đến cao</option>
                        <option value="">Thứ tự theo giá: cao đến thấp</option>
                    </select>
                </div>
            </div>
            <div class="row g-0">
                <nav id="sidebarMenu" class="d-lg-block d-none col-2 col-md-3">
                    <div class="position-sticky">
                        <h4 class="fw-bold">DANH MỤC SẢN PHẨM</h4>
                        <div class="list-group list-group-flush mt-4 fs-5">
                            <?php foreach ($category as $value) { ?>
                                <a href="index.php?type=Category&id=<?php echo $value['id'] ?>" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
                                    <span><?php echo $value['name_category'] ?></span>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </nav>
                <div class="listProduct col-12 col-md-9">
                    <?php listProducts($listProduct) ?>
                </div>
            </div>
        </div>
    </main>